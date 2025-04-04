<?php
require_once "config.php";
// Initialize the session
session_start();
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    echo '<script>alert("Please login before proceeding!")</script>';
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seat Booking</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jQuery.js"></script>
    <script type="text/javascript" src="../jQuery-Seat-Charts/jquery.seat-charts.min.js"></script>
    <style type="text/css">
        body {
            background-color: #f6f6f6;
        }

        header .fa-chevron-left {
            color: #fff;
        }

        header a {
            color: #fff;
        }

        header {
            padding: 20px;
            background-color: #001b66;
            color: #fff;
            width: 97%;
        }

        .front {
            width: 800px;
            margin: 5px 32px 45px 32px;
            background-color: #f0f0f0;
            color: #666;
            text-align: center;
            padding: 3px;
            border-radius: 5px;
        }

        .booking-details {
            float: right;
            position: relative;
            width: 350px;
            height: 450px;
            margin-top: 30px;
        }

        .booking-details p {
            line-height: 26px;
            font-size: 16px;
            color: #999
        }

        .booking-details p span {
            color: #666
        }

        .checkout-button {
            display: block;
            width: 180px;
            height: 40px;
            margin: 10px auto;
            border: 1px solid #666;
            font-size: 14px;
            cursor: pointer;
            background-color: #001b66;
            color: #fff;
        }

        .checkout-button:hover {
            background-color: #001b88;
        }

        div.seatCharts-cell {
            color: #182C4E;
            height: 25px;
            width: 25px;
            line-height: 25px;
            margin: 7px;
            float: left;
            text-align: center;
            outline: none;
            font-size: 13px;
        }

        div.seatCharts-seat {
            color: #fff;
            cursor: pointer;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        div.seatCharts-row {
            height: 35px;
            margin: 5px;
        }

        div.seatCharts-seat.available {
            background-color: #fff;
            color: #000;
        }

        div.seatCharts-seat.focused {
            background-color: #001b66;
            border: none;
        }

        div.seatCharts-seat.selected {
            background-color: #001b88;
        }

        div.seatCharts-seat.unavailable {
            background-color: #818181;
            color: #000;
            cursor: not-allowed;
        }

        div.seatCharts-container {
            border-right: 1px dotted #adadad;
            width: 850px;
            padding: 20px;
            float: left;
        }

        div.seatCharts-legend {
            padding-left: 0px;
            position: relative;
            bottom: 16px;
        }

        ul.seatCharts-legendList {
            padding-left: 0px;
            background-color: #f0f0f0;
        }

        .seatCharts-legendItem {
            width: 50px;
            margin-top: 10px;
            line-height: 2;
            display: inline-table;
        }

        span.seatCharts-legendDescription {
            margin-left: 5px;
            line-height: 30px;
        }

        #selected-seats li {
            float: left;
            width: 72px;
            height: 26px;
            line-height: 26px;
            border: 1px solid #d3d3d3;
            background: #f7f7f7;
            margin: 6px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            list-style-type: none;
        }

        #selected-seats {
            max-height: 150px;
            overflow-y: auto;
            overflow-x: none;
            width: 200px;
        }

        div.seatCharts-seat.available.platinum {
            background-color: #3fe0D0;
        }

        div.seatCharts-seat.available.gold {
            background-color: #b0dfe5;
        }

        div.seatCharts-seat.available.silver {
            background-color: #588bae;
        }
    </style>
</head>
<body>
<header>
    <i class="fas fa-chevron-left fa-lg"></i><span onclick="history.back()">Back to ShowTimes</span>

</header>
<div class="demo">
    <div id="seat-map">
    </div>
    <?php
    $sql = 'select time_format("' . $_GET['time'] . '","%H %i") as time';
    mysqli_query($conn, $sql) or die($sql);
    $result_set = mysqli_query($conn, $sql);
    $time = mysqli_fetch_array($result_set);
    $time_1 = explode(" ", $time['time']);
    if (strpos($_GET['time'], "PM") !== false) {
        $query = "select sid,type,price from seat_type join showtimes using(sid) where mid=" . $_GET['id'] . " and theatre='" . $_GET['cid'] . "' and show_date = '" . $_GET['date'] . "' and show_time like '" . ($time_1[0] + 12) . ":" . $time_1[1] . ":__'";
    } else {
        $query = "select sid,type,price from seat_type join showtimes using(sid) where mid=" . $_GET['id'] . " and theatre='" . $_GET['cid'] . "' and show_date = '" . $_GET['date'] . "' and show_time like '" . ($time_1[0]) . ":" . $time_1[1] . ":__'";
    }
    mysqli_query($conn, $query) or die($query);
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $type[$row['type']] = $row['price'];
        $sid = $row['sid'];
    }

    $query2 = 'select concat(row_no,col_no) as seats from seat_reserved where sid=' . $sid . '';
    $result2 = mysqli_query($conn, $query2);
    $seat = array();
    while ($row2 = mysqli_fetch_array($result2)) {
        array_push($seat, $row2['seats']);
    }
    $seat_reserved = "[";
    foreach ($seat as $value) {
        $seat_reserved .= "'" . $value . "',";
    }
    $seat_reserved .= "]";
    if (strpos($_GET['time'], "PM") !== false) {
        $sql2 = "select mid,mname, concat(date_format(show_date,'%d %M'),' ',time_format(show_time,'%h:%i %p')) as datetime from movies join showtimes using(mid) where mid=" . $_GET['id'] . " and theatre='" . $_GET['cid'] . "' and show_date = '" . $_GET['date'] . "' and show_time like '" . ($time_1[0] + 12) . ":" . $time_1[1] . ":__'";
    } else {
        $sql2 = "select mid,mname, concat(date_format(show_date,'%d %M'),' ',time_format(show_time,'%h:%i %p')) as datetime from movies join showtimes using(mid) where mid=" . $_GET['id'] . " and theatre='" . $_GET['cid'] . "' and show_date = '" . $_GET['date'] . "' and show_time like '" . ($time_1[0]) . ":" . $time_1[1] . ":__'";
    }
    mysqli_query($conn, $sql2) or die($sql2);
    $result_set2 = mysqli_query($conn, $sql2);
    $mname = mysqli_fetch_array($result_set2);
    ?>
    <div class="booking-details">
        <p>Movie:<span id="mname"><?php echo $mname['mname']; ?></span></p>
        <p>Time:<span id="datetime"><?php echo $mname['datetime']; ?></span></p>
        <p>Seat:</p>
        <ul id="selected-seats"></ul>
        <p>Tickets:<span id="counter">0</span></p>
        <p>Total: <b>Rs.<span id="total">0</span></b></p>
        <button class="checkout-button" onclick="openPage();">Pay Now</button><br><br>;
        <div id="legend"></div>
    </div>
    <div class="front">SCREEN</div>
    <div style="clear: both;"></div>
</div>

<script type="text/javascript">
    let booked_seats = [];
    $(document).ready(function () {
        var $cart = $('#selected-seats'), //Sitting Area
            $counter = $('#counter'), //Votes
            $total = $('#total'); //Total money

        var sc = $('#seat-map').seatCharts({
            map: [  //Seating chart
                'ppp_ppppppppp_ppp',
                'ppp_ppppppppp_ppp',
                '_________________',
                'ggg_ggggggggg_ggg',
                'ggg_ggggggggg_ggg',
                'ggg_ggggggggg_ggg',
                'ggg_ggggggggg_ggg',
                'ggg_ggggggggg_ggg',
                '_________________',
                '____sssssssss____',
                '____sssssssss____'
            ],
            <?php
            echo 'seats:{
                p:{
                    price:' . $type['Platinum'] . ',   //platinum
                    classes:"platinum"
                },

                g:{
                    price:' . $type['Gold'] . ',   //gold
                    classes:"gold"
                },

                s:{
                    price:' . $type['Silver'] . ',   //silver
                    classes:"silver"
                }
            },'; ?>
            naming: {
                top: false,
                rows: ['A', 'B', '', 'C', 'D', 'E', 'F', 'G', '', 'H', 'I'],
                columns: ['1', '2', '3', '', '4', '5', '6', '7', '8', '9', '10', '11', '12', '', '13', '14', '15'],
                getLabel: function (character, row, column) {
                    return column;
                },
                getId: function (character, row, column) {
                    return row + '' + column;
                }

            },
            <?php echo "legend : { //Definition legend
                node : $('#legend'),
                items : [
                    [ 'p', 'unavailable', 'Sold'],
                    [ 'p', 'available',   'Rs. " . $type['Platinum'] . "' ],
                    ['g','available','Rs. " . $type['Gold'] . "'],
                    ['g','available','Rs. " . $type['Silver'] . "'],
                ]              
            }" ?>,
            click: function () { //Click event
                if (this.status() == 'available') { //optional seat
                    $('<li>' + this.settings.id + '</li>')
                        .attr('id', 'cart-item-' + this.settings.id)
                        .data('seatId', this.settings.id)
                        .appendTo($cart);

                    $counter.text(sc.find('selected').length + 1);
                    $total.text(recalculateTotal(sc) + this.data().price);
                    booked_seats.push(this.settings.id);
                    console.log(booked_seats);

                    return 'selected';
                } else if (this.status() == 'selected') { //Checked
                    //Update Number
                    $counter.text(sc.find('selected').length - 1);
                    //update totalnum
                    $total.text(recalculateTotal(sc) - this.data().price);

                    //Delete reservation
                    $('#cart-item-' + this.settings.id).remove();
                    let uncheck = this.settings.id;
                    booked_seats = booked_seats.filter(function (e) {
                        return e !== uncheck
                    })
                    console.log(booked_seats);
                    //optional
                    return 'available';
                } else if (this.status() == 'unavailable') { //sold
                    return 'unavailable';
                } else {
                    return this.style();
                }
            }
        });
        //sold seat

        sc.get(<?php echo $seat_reserved ?>).status('unavailable');

    });

    function openPage() {
        var mname = document.getElementById('mname').textContent;
        var datetime = document.getElementById('datetime').textContent;
        var total = document.getElementById('total').textContent;
        window.location.href = (window.location.href + "&mname=" + mname + "&total=" + total + "&seats=" + booked_seats).replace("seating", "payment");

    }

    //sum total money
    function recalculateTotal(sc) {
        var total = 0;
        sc.find('selected').each(function () {
            total += this.data().price;
        });

        return total;
    }
</script>
</body>
</html>
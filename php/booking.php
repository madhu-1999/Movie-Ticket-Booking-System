<?php
require_once "config.php";
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>CiNext-Showtimes</title>
    <link rel="stylesheet" href="../css/header-footer.css" type="text/css">
    <link rel="stylesheet" href="../css/booking.css" type="text/css">
    <script type="text/javascript" src="../js/user_sidenav.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8f6d4e20a8.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/searchbar-ajax.js"></script>
    <script type="text/javascript" src="../js/user_profile.js"></script>
</head>
<body>
    <header>
        <nav class="topnav">
            <div class="logo">
                <h2>CiNExt</h2>
                <form method="get" action="search.php">
                    <input type="text" name="search" placeholder="Search for movies" size="35" id="search-box" list="result">
                    <datalist id="result"></datalist>
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <a href="login.php">Login</a>
                <a href="signup.html">Sign Up</a>
                <br><br><br>
            </div>
            <a href="home.php">Home</a>
            <a href="aboutus.php">About Us</a>
            <div class="dropdown">
                <a href="cinema.html">Cinemas</a>
                <div class="dropdown-content">
                    <a href="cinema.html#seasonsmall">CiNExt Seasons Mall,Hadapsar</a>
                    <a href="cinema.html#bundgarden">CiNext Bund Garden</a>
                    <a href="cinema.html#pacificmall">CiNext Pacific Mall</a>
                    <a href="cinema.html#pavillionmall">CiNext Pavillion Mall</a>
                </div>
            </div>
            <a href="home.php">Movies</a>
        </nav>
    </header>

    <nav id="usernav" class="sidenav">
        <div class="sidenav-banner">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
            <h3>Hi User</h3>
        </div>
        <br><br>
        <a href="user_profile.php" onclick="setIframeSrc('iframe','../html/profile.html')"><i class="fas fa-id-badge"></i>&nbsp;&nbsp;&nbsp;Profile</a>
        <br><br>
        <a href="user_profile.php" onclick="setIframeSrc('iframe','book_history.php')"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;Purchase History</a>
        <br><br>
        <a href="support.php"><i class="fas fa-headset"></i>&nbsp;&nbsp;&nbsp;Help & Support</a>
        <br><br><br>
        <a href="logout.php"><input type="button" name="sign_out" value="Sign out"></a>
    </nav>

    <section id="movie-banner">
        <?php
        $query = 'SELECT mname, rating, DATE_FORMAT(release_date, "%d %M %Y") AS release_date, TIME_FORMAT(runtime, "%H hrs %i mins") AS runtime, GROUP_CONCAT(genre) AS genre, lang FROM movies JOIN movie_genre USING(mid) WHERE mid = ' . $_GET['id'];
        mysqli_query($conn, $query) or die("Error querying database");
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $genre_arr = explode(",", $row['genre']);
            echo '<h1>' . $row['mname'] . '</h1>
                    <div id="info">
                    <h5>' . $row['rating'] . '</h5>';
            foreach ($genre_arr as $value) {
                echo '<h5>' . $value . '</h5>';
            }
            echo '<h5>' . $row['lang'] . '</h5>
                    <h5 style="border:none;">' . $row['release_date'] . '</h5>
                    <h5 style="border:none;"><i class="fas fa-clock"></i>' . $row['runtime'] . '</h5>
                    </div>';
        }
        ?>
    </section>

    <section style="min-height: 350px;">
        <?php
        // mysql_data_seek($result, 0); //reset result set - **REMOVED**
        // $row = mysqli_fetch_array($result); - **REMOVED**
        $query1 = 'SELECT DISTINCT(DATE_FORMAT(show_date, "%d %M")) AS date, show_date, DAYNAME(show_date) AS day FROM showtimes WHERE show_date >= CURDATE() AND mid = ' . $_GET['id'] . ' ORDER BY show_date LIMIT 4';
        mysqli_query($conn, $query1) or die("MySQL Error: " . mysqli_error($conn));
        $result1 = mysqli_query($conn, $query1);
        echo '<div class="date-wrapper">';
        while ($row1 = mysqli_fetch_array($result1)) {
            echo '<button class="tablink" onclick="openPage(\'' . trim($row1['date']) . '\',this)">' . $row1['day'] . ' ' . $row1['date'] . '</button>';
        }
        echo '<ul id="legend">
                    <li><i class="fas fa-circle" style="color:#00ff00"></i>AVAILABLE</li>
                    <li><i class="fas fa-circle" style="color: #ffa500"></i>FAST FILLING</li>
                    <li><i class="fas fa-circle" style="color: #808080"></i>UNAVAILABLE</li>
                    </ul></div>';

        mysqli_data_seek($result1, 0); // Use mysqli_data_seek with the connection resource
        while ($row1 = mysqli_fetch_array($result1)) {
            $sql = 'SELECT DISTINCT theatre, show_date, GROUP_CONCAT(TIME_FORMAT(show_time, "%h:%i %p")) AS show_time, GROUP_CONCAT(status) AS status FROM showtimes WHERE show_date="' . $row1['show_date'] . '" AND mid = ' . $_GET['id'] . ' GROUP BY theatre';
            mysqli_query($conn, $sql) or die("Error querying database");
            $result2 = mysqli_query($conn, $sql);
            echo '<div id="' . trim($row1['date']) . '" class="tabcontent">';
            while ($row2 = mysqli_fetch_array($result2)) {
                $show_time_arr = explode(",", $row2['show_time']);
                $status_arr = explode(",", $row2['status']);
                $time_status_map = array_combine($show_time_arr, $status_arr);
                echo '<div class="showtimes">
                            <p>' . $row2['theatre'] . '</p>';
                foreach ($time_status_map as $key => $value) {
                    if ($value == 'Available') {

                        echo '<a href="seating.php?id=' . $_GET['id'] . '&cid=' . $row2['theatre'] . '&date=' . $row2['show_date'] . '&time=' . $key . '"><button style="color:#00ff00">' . $key . '</button></a>';
                    } elseif ($value == 'Fast Filling') {
                        echo '<button style="color:#ffa500">' . $key . '</button>';
                    } else {
                        echo '<button style="color:#808080" disabled>' . $key . '</button>';
                    }
                }
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </section>

    <?php
    // Check if the user is already logged in, if yes then remove login signup buttons.
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $val = '<i class="fas fa-user-circle fa-2x" onclick="openNav()"></i>';
        $val = str_replace('"', '\\"', $val);
        echo '<script>
        $(document).ready(function(){
            $(".logo a").remove();
            $(".logo form").append("' . $val . '");
            $(".sidenav h3").text("Hi ' . $_SESSION['username'] . '");
            $(".fa-user-circle").css({"float":"right","margin-left":"490px"});
            $(".tablink").first().click();
        });
        </script>';
    }
    ?>

    <footer class="footer">
        <table>
            <tr>
                <th><a href="home.php">Home</a></th>
                <th><a href="home.php">Movies</a></th>
                <th colspan="2">Get In Touch</th>
                <th colspan="3">Help & Support</th>
            </tr>
            <tr>
                <th><a href="cinema.html">Cinemas</a></th>
                <th><a href="aboutus.php">About Us</a></th>
                <td><a href="mailto:cinext@gmail.com">Contact Us</a></td>
                <td><a href="../html/feedback.html">Feedback</a></td>
                <td><a href="sitemap.php">SiteMap</a></td>
                <td><a href="support.php">FAQs</a></td>
                <td><a href="../html/tnc.xml">Terms and Conditions</a></td>
            </tr>
        </table>
        <center><small>Copyright 2020 &copy XYZ Corporation.All Rights Reserved</small></center>
    </footer>
</body>
</html>
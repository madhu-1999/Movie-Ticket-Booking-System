<?php
    require_once "config.php";
    session_start();?>

    <!DOCTYPE html>
    <html>
        <body>
            <?php 
                $sql = 'select sid,price, booked_time from booking where user_id='.$_SESSION['id'].'';
                mysqli_query($conn,$sql) or die($sql);
                $result = mysqli_query($conn,$sql);
                $rowcount = mysqli_num_rows($result);
                if($rowcount){
                    echo '<table>';
                    while($row = mysqli_fetch_array($result)){
                        $sql2 = 'select theatre,mname,date_format(show_date,"%d %M") as show_date,time_format(show_time,"%H:%i %p")
                        as show_time from showtimes join movies using(mid) where sid = '.$row['sid'].'';
                        mysqli_query($conn,$sql2) or die($sql2);
                        $result2 = mysqli_query($conn,$sql2);
                        while($row2 = mysqli_fetch_array($result2)){
                            echo '
                            <tr>
                                <td> '.$row2['mname'].'</td>
                                <td> '.$row2['show_date'].'</td>
                                <td> '.$row2['show_time'].'</td>
                                <td> '.$row2['theatre'].'</td>
                                <td> '.$row['price'].'</td>
                                <td> '.$row['booked_time'].'</td>
                            </tr>';
                        }
                    }
                    echo '</table>';
                }
                else{
                    echo '<p> No recent Bookings! </p>';
                }
               mysqli_close($conn);
            ?>
        </body>
    </html>

    
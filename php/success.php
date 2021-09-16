<?php 
require_once "config.php";
 // Initialize the session
session_start();
  $sql = 'select time_format("'.$_GET['time'].'","%H %i") as time';
  mysqli_query($conn,$sql) or die($sql);
  $result_set = mysqli_query($conn,$sql);
  $time =mysqli_fetch_array($result_set);
   $time_1 = explode(" ", $time['time']);
   if(strpos($_GET['time'],"PM")!==false){
$sql = "select sid from showtimes  where mid=".$_GET['id']." and theatre='".$_GET['cid']."' and show_date = '".$_GET['date']."' and show_time like '".($time_1[0]+12).":".$time_1[1].":__'";
}else{
  $sql = "select sid from showtimes  where mid=".$_GET['id']." and theatre='".$_GET['cid']."' and show_date = '".$_GET['date']."' and show_time like '".($time_1[0]).":".$time_1[1].":__'";

}
      mysqli_query($conn,$sql) or die($sql);
    $result = mysqli_query($conn,$sql);
    $sid = mysqli_fetch_array($result);
    $rowcount = $mysqli_num_rows[$result];
    $seats = explode(",",$_GET['seats']);
    foreach ($seats as $value){
    	$split = preg_split("//", $value,-1,PREG_SPLIT_NO_EMPTY);
    	$sql2 = 'insert into seat_reserved values("'.$split[0].'",'.$split[1].''.$split[2].','.$sid['sid'].')';
    	if (mysqli_query($conn, $sql2)) {
    		
		} else {
  			  echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
			}
     }
     echo '<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="../css/success.css">
    <script type="text/javascript">
        function goBack() 
        {
             window.history.back();
        }
    </script>
</head>
<body>
    <div class="success_msg">
        <h1>Payment Successful</h1>
       
';

     $created_date = date("Y-m-d H:i:s");
     $sql3 = 'insert into booking(user_id,sid,price,booked_time) values('.$_SESSION['id'].','.$sid['sid'].','.$_GET['total'].',"'.$created_date.'")';
     if (mysqli_query($conn, $sql3)) {
    		echo ' <h4>Tickets Booked successfully.
        </h4>
    </div>
    <a href="home.php"><button class="button1">Home</button></a>
</body>
</html>';
		} else {
  			  echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
			}
     }

?>
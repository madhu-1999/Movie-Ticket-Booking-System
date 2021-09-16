<?php
 require_once "config.php";
 // Initialize the session
session_start(); 
$sql = 'select date_format('.$_GET['date'].',"%d %M") as dates';
mysqli_query($conn,$sql) or die($sql);
    $result_set2 = mysqli_query($conn,$sql);
    $dates = mysqli_fetch_array($result_set2);
?>

<!DOCTYPE html>
<html>
<head>
	<title>CiNext-Payment</title>
	<link rel="stylesheet" type="text/css" href="../css/payment.css">
	<script type="text/javascript" src="../js/payment.js"></script>
	<script src="https://kit.fontawesome.com/8f6d4e20a8.js" crossorigin="anonymous"></script>

</head>
<body>
	<section class="payment-container">
		 <div class="booking-details">
		 			<pre>Booking Details</pre>
         <p>Movie:<span id="mname"><?php echo $_GET['mname']; ?></span></p>
         <p>Time:<span id="datetime"><?php echo $dates['dates'].' '.$_GET['time'];?></span></p>
         <p>Seat:</p>
         <ul id="selected-seats"><?php $seats = explode(",",$_GET['seats']);
         							foreach ($seats as $value){
         								echo '<li>'.$value.'</li>';
         							}?></ul>
         <p>Tickets:<span id="counter"><?php echo count($seats);?></span></p>
         <p>Total: <b>Rs.<span id="total"><?php echo $_GET['total'];?></span></b></p>
      </div>
		<div class="paydiv">
	<form  method="post" id="v1form" onsubmit = "return validate();">
		<pre style="text-align: center;font-size: 20px;">Payment</pre>
  		<div class="container">
    		<label for="cardno"><b>Card Number</b></label><i class="fas fa-asterisk"></i>
			<input type="text" placeholder="Enter Card Number" id="cardno" name="cdno" required>
    		<small id="name_error">Error message</small>

   			<label for="exp"><b>Expiry Date</b></label><i class="fas fa-asterisk"></i>
  			<input type="Date" placeholder="mm/yy" size="5" id="exp" name="cdDate" required>
  			<small id="exp_error">Error message</small>

  			<label for="cvv"><b>CVV</b></label><i class="fas fa-asterisk"></i>
			<input type="password" size="3" maxlength="3" placeholder="CVV" id="cvv" name="cdpswd" required>
			<small id="password_error">Error message</small>

			<label for="pwd"><b>Card Holder Name</b></label><i class="fas fa-asterisk"></i>
			<input type="text" placeholder="Enter Card Holder's Name" id="cdname" name="cdname" required>
			<small id="cdname_error">Error message</small>			

  			<button type="submit" name="payment-submit">Pay</button>
    	
 		</div>
  		<div class="container" style="background-color:#f1f1f1">
    		<button type="button" class="cancelbtn" onclick="history.back()">Cancel</button>
  		</div>
	</form>
		</div>
	</section>
</body>
</html>
<?php
require_once "config.php";

$sql = "select * from users where email = '".$_POST['email']."'";
$result = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($result);
if($rowcount){
		$sql2 = "update users set password ='".$_POST['pwd']."' where email ='".$_POST['email']."'";
		if(mysqli_query($conn,$sql2)){
			echo '<script>alert("Update successful")</script>';
		}
		else{
			echo '<script>alert("Update unsuccessful")</script>';
		}
}else{
	echo '<script>alert("Email not registered!");</script>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>CiNext-Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
	<script src="https://kit.fontawesome.com/8f6d4e20a8.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/signup.js"></script>
</head>
<body>
	<form  method="post" id="signup-form" onsubmit="return validate()">
		<pre style="text-align: center;font-size: 20px;">CiNext Forgot Password</pre>
  		<div class="container">
    		<label for="email"><b>Email</b></label><i class="fas fa-asterisk"></i>
    		<input type="text" placeholder="Enter Email" name="email" id="email" required>
    		<small id="error1">Error message</small>

   			<label for="pwd"><b>Password</b></label><i class="fas fa-asterisk"></i>
  			<input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

   			<label for="confirm_pwd"><b>Confirm Password</b></label><i class="fas fa-asterisk"></i>
  			<input type="password" placeholder="Confirm Password" name="confirm_pwd" id="confirm_pwd" required>
  			<small id="error2">Error message</small>

  			<label for="sec-ques"><b>Security Question</b></label>
			<select name="sec_ques">
	  			<option value="What primary school did you attend?">What primary school did you attend?</option>
	  			<option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
				<option value="What was your childhood nickname?">What was your childhood nickname?</option>
				<option value="What is your favourite movie?">What is your favourite movie?</option>
			</select>

			<label for="sec_ans"><b>Security Answer</b></label><i class="fas fa-asterisk"></i>
    		<input type="text" placeholder="Enter Answer" name="sec_ans" id="sec_ans" required>
    		<small id="error3">Error message</small>

  			<button name="signup-submit">Change Password</button>
 		</div>
  		<div class="container" style="background-color:#f1f1f1">
    		<a href="home.php"><button type="button" class="cancelbtn">Cancel</button></a>
  		</div>
	</form>
</body>
</html>
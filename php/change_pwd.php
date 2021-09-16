<?php 
		 require_once "config.php";
		 session_start();

		 echo $_POST["old_pwd"];
		 if($_SERVER["REQUEST_METHOD"] == "POST"){
		 echo $_SESSION['username'];
		 $sql = "update users set password=" .$_POST['new_pwd']. " where id= " .$_SESSION['id']. "";
		 if(mysqli_query($conn,$sql)===TRUE){
		 	echo "alert('Updated successfully')";
		 }
		 else{
		 	echo "alert('Error occured.Try again.')";
		 }
		}

		 $conn->close();
?>
<!--<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/change_pwd.js"></script>	
</head>
<body>
	<section class="form-container">
		<form  method="post" id="change_pwd">
			<table>
					<tr>
						<td><label class="input-container" for="old_pwd">Old Password</label></td>
						<td><i class="fas fa-lock"></i>
							<input type="password" name="old_pwd" id="old_pwd"  size="25" required>
							<i class="fas fa-asterisk"></i>
							<small>Error Message</small>
						</td>
					</tr>

					<tr>
						<td><label class="input-container" for="new_pwd">New Password</label></td>
						<td><i class="fas fa-lock"></i>
							<input type="password" name="new_pwd" id="new_pwd"  size="25" required>
							<i class="fas fa-asterisk"></i>
							<div class="tooltip"><i class="fas fa-info-circle"></i>
							<span class="tooltiptext">Password must be minimum 8 characters long and contain atleast one digit , special character , uppercase character and lowercase character</span>
							<small>Error Message</small>
						</div>
						</td>
					</tr>

					<tr id="hidden-row">
						<td>&nbsp;</td>
						<td><meter min="0" max="10" value="3" optimum="8" id="meter" low="3" high="7"></meter></td>
						<td><span id="pass-type"></span></td>
					</tr>

					<tr>
						<td><label class="input-container" for="confirm_pwd">Confirm Password</label></td>
						<td>
							<i class="fas fa-lock"></i>
							<input type="password" name="confirm_pwd" id="confirm_pwd"  size="25" required>
							<i class="fas fa-asterisk"></i>
							<small>Error Message</small>
						</td>
					</tr>
			</table>
		</form>
		<button type="submit" name="change" onclick="pwdvalidate()">Change Password</button>
	</section>
</body>
</html>
-->
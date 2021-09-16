<?php
	//Initialaize session
	session_start();

	// Include config file
	require_once "config.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$email = trim($_POST['email']);
		$pwd = trim($_POST['pwd']);
		$query = 'Select id,email,password,username from users where email = "' .$email. '"' ;	
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$rowcount = mysqli_num_rows($result);
		if($result){
		if($rowcount){
			if($pwd == $row['password']){
				//Password correct.Start new session
				session_start();

				// Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $row['id'];
                $_SESSION["username"] = $row['username'];

                // Redirect user to home page
                header("location: home.php");
				
			}
			else{
				echo '<script> 
				alert("Invalid email or password");
			</script>';
			}
		}
		else{
			echo '<script> 
				alert("Invalid email or password");
			</script>';
			}
		}else{
			echo '<script> 
				alert("query failed");
			</script>';
		}
	}

	//close connection
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>CiNext-Login</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<script src="https://kit.fontawesome.com/8f6d4e20a8.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/login.js"></script>
</head>
<body>
	<form  method="post" id="login-form" onsubmit="return validate();">
		<pre style="text-align: center;font-size: 20px;">CiNext Login</pre>
  		<div class="container">
    		<label for="email"><b>Email</b></label><i class="fas fa-asterisk"></i>
    		<input type="text" placeholder="Enter Email" name="email" id="email" required>
    		<small>Error message</small>

   			<label for="pwd"><b>Password</b></label><i class="fas fa-asterisk"></i>
  			<input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

  			<button type="submit"  name="login-submit" onclick="history.back()">Login</button>
    		<label>
      			<a href="signup.php">Don't have an account? Sign up.</a>
    		</label>
 		</div>
  		<div class="container" style="background-color:#f1f1f1">
    		<button type="button" class="cancelbtn" onclick="history.back()">Cancel</button>
   			<span class="psw"><a href="forgot-password.php">Forgot password</a></span>
  		</div>
	</form>
</body>
</html>
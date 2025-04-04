<?php
	require_once "config.php";
	// Initialize the session
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>CiNExt-User Profile</title>
	<link rel="stylesheet" type="text/css" href="../css/header-footer.css">
	<link rel="stylesheet" type="text/css" href="../css/user_profile.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/user_sidenav.js"></script>
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

		<?php 
		// Check if the user is already logged in, if yes then remove login signup buttons.
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
   		echo '<script>
   		$(document).ready(function(){
  		$(".sidenav h3").text("Hi ' .$_SESSION['username']. '");
		});</script>';
		}
	?>

	<section>
		<button class="tablink" onclick="setIframeSrc('iframe','../html/profile.html')" target="iframe">Edit Profile</button>
		<button class="tablink" onclick="setIframeSrc('iframe','book_history.php')" target="iframe">Booking History</button>
		<button class="tablink" onclick="setIframeSrc('iframe','../html/notif_settings.html')" target="iframe">Notification Settings</button>
		<button class="tablink" onclick="setIframeSrc('iframe','../html/change_pwd.html')" target="iframe">Change Password</button>
	</section>
	<hr>

	<section class="iframe-container">
		<iframe id="iframe" src="../html/profile.html" scrolling="no"></iframe>
	</section>

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

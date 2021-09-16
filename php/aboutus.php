<?php
 require_once "config.php";
 // Initialize the session
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>CiNext-Home Page</title>
	<link rel="stylesheet" href="../css/header-footer.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/aboutus.css">
	<script type="text/javascript" src="../js/user_sidenav.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/8f6d4e20a8.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<nav class="topnav">
			<div class="logo">
				<h2>CiNExt</h2>
				<form method="get" action="search.php">
					<input type="text" name="search" placeholder="Search for movies,cinema..." size="35" list="movies">
					<datalist id="movies">
						<option>Tanhaji:the Unsung Hero</option>
						<option>Chhapak</option>
						<option>Good Newz</option>
					</datalist>
					<button type="submit"><i class="fas fa-search"></i></button>
				</form>
				<a  href="login.php">Login</a>
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

	<?php 
		// Check if the user is already logged in, if yes then remove login signup buttons.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	$val = '<i class="fas fa-user-circle fa-2x" onclick="openNav()"></i>';
	$val = str_replace('"', '\\"', $val);
   echo '<script>
   $(document).ready(function(){
  		$(".logo a").remove();
  		$(".logo form").append("'.$val.'");
  		$(".sidenav h3").text("Hi ' .$_SESSION['username']. '");
  		$(".fa-user-circle").css({"float":"right","margin-left":"490px"});
});</script>'

}
	?>
	
	<section class="iframe-container">
		<iframe id="iframe" src="../html/aboutus.xml" scrolling="no"></iframe>
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
		</table>
		<center><small>Copyright 2020 &copy XYZ Corporation.All Rights Reserved</small></center>
	</footer>
</body>
</html>
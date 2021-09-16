<?php
 require_once "config.php";
 // Initialize the session
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/header-footer.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/movies.css">
	<script type="text/javascript" src="../js/user_sidenav.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/8f6d4e20a8.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/searchbar-ajax.js"></script>

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



	<div class="movie-wrapper">
		<div class="movie-info">
			<div class="card">
				<?php 
					$id  = $_GET['id'];
					
					$query = 'select mname,image,runtime,rating,release_date,synopsis,trailer,lang from movies where mid=' .$id. '';
					mysqli_query($conn,$query) or die("Error querying database");
					$result = mysqli_query($conn,$query);
					$row['synopsis'] = str_replace("'","\\'",$row['synopsis']);
					while($row = mysqli_fetch_array($result)){
					echo ' <video width="855" height="480" controls>
  						<source src="' .$row['trailer']. '" type="video/mp4">
					</video>
					<br><br><h2>' .$row['mname']. '</h2><br><br>
					<a href="search-misc.php?key=rating&val=' .$row['rating']. '"><pre style="font-size:18px;">' .$row['rating']. '</a>|' .$row['runtime']. '|' .$row['release_date']. '|<a href="search-misc.php?key=lang&val=' .$row['lang']. '">' .$row['lang']. '</a></div><div class="card"><h4>About</h4>
						<p style="word-wrap:normal;">' .$row['synopsis']. '</p></div></div>';
					echo '<div class="movie-desc">
					<div class="card">
						<image src="' .$row['image']. '" width="300" height="400">
					</div>
					<a href="booking.php?id=' .$id. '"><button  id="book">Book Tickets</button></a>';

					$sql = 'select genre from movie_genre where mid=' .$id. '';
					mysqli_query($conn,$query) or die("Error querying database");
					$result1 = mysqli_query($conn,$sql);
					echo '<div class="card"><p>Genres: ';
					while($row1 = mysqli_fetch_array($result1)){
						echo '' .$row1['genre']. ' ';
					}
					echo '</p></div>';

					// Check if the user is already logged in, if yes then remove login signup buttons.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	$val = '<i class="fas fa-user-circle fa-2x" onclick="openNav()"></i>';
	$val = str_replace('"', '\\"', $val);
   echo '<script>
   $(document).ready(function(){
   		$("title").append("CiNext-'.$row['mname'].'");
  		$(".logo a").remove();
  		$(".logo form").append("'.$val.'");
  		$(".sidenav h3").text("Hi ' .$_SESSION['username']. '");
  		$(".fa-user-circle").css({"float":"right","margin-left":"490px"});
});</script>'

}

		}

		//close connection
		mysqli_close($conn);
	?>

	</div>
</div>

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
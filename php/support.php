<?php
 require_once "config.php";
 // Initialize the session
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Help & Support | CiNExt</title>
	<link rel="stylesheet" type="text/css" href="../css/header-footer.css">
	<link rel="stylesheet" type="text/css" href="../css/support.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/8f6d4e20a8.js" crossorigin="anonymous"></script> 
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/user_sidenav.js"></script>

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
});</script>';

}
	?>

	<section class="faq">
		<h2>FAQ</h2>
		<input type="checkbox" id="faq1">
		<label for="faq1">Why do I have to pay extra to book tickets through the website?</label>
		<div class="content">
			<p>A nominal fee is added to your transaction to help us provide you with the convenience of booking tickets without having to come to the cinema.It requires considerable expenditure in provisioning the service and the fee is collected to ensure the service remains reliable at all times. This is a standard industry practice.</p>
		</div>

		<input type="checkbox" id="faq2">
		<label for="faq2">Is buying tickets online safe and secure?</label>
		<div class="content">
			<p> Yes, the online booking service is protected by the latest 128 bit Secure Socket Layer (SSL) security. We have partnered with Citrus Pay which is a PCI- DSS Level-1 certified Payment gateway. Citrus Pay has real time monitoring for all transactions being processed; there are guidelines that protect your transaction at the PG level. Citrus Pay is partnership with ReD (Retail Decisions Inc.), which is one of the world’s foremost providers of fraud prevention services</p>
		</div>

		<input type="checkbox" id="faq3">
		<label for="faq3"> What happens if my machine hangs or restarts or my internet line disconnects when I am in the middle of a booking? </label>
		<div class="content">
			<p> Your account might have got debited for the amount of the tickets you were trying to purchase. If this is the case, your amount will automatically be refunded to your Credit Card / Bank account within a maximum of 10 working days. If you do not receive the refund within this period, please contact us on eticketing@cinext.com.</p>
		</div>

		<input type="checkbox" id="faq4">
		<label for="faq4">  How do I know if my booking is confirmed?</label>
		<div class="content">
			<p>Confirmation of your booking is clearly displayed on your computer screen at the end of the booking process. You can print this information if you wish, but this is not necessary in order to receive your tickets. In addition, as you have entered an email address, confirmation of your booking will be sent to you via email followed by an SMS on the number given by you while booking the tickets.</p>
		</div>

		<input type="checkbox" id="faq5">
		<label for="faq5"> Once I have booked tickets online, how do I collect them? </label>
		<div class="content">
			<p>You can collect your tickets from the Box Office or ticket kiosk at the cinema you have booked tickets for. Please remember to bring your Credit / Debit card with you ensuring it is the one used to make the purchase. For security reasons, the card holder MUST be present for the tickets to be collected at the cinema.</p>
		</div>

		<input type="checkbox" id="faq6">
		<label for="faq6">Once I have booked tickets online, when can I collect them?</label>
		<div class="content">
			<p>The tickets may be collected during the cinema's normal opening hours as soon as the booking has been confirmed, any time before the show time. However, it is advisable to be present 20 to 30 minutes before the show time to cushion against last minute delays</p>
		</div>

		<input type="checkbox" id="faq7">
		<label for="faq7">What happens if I forget my password? </label>
		<div class="content">
			<p>Well it happens to the best of us! Simply select the Sign in button on the top right hand side navigation bar and click on the Forgot Password link. You will have to answer the security question asked during sign up to reset password.</p>
		</div>

		<input type="checkbox" id="faq8">
		<label for="faq8"> How can I find out about the facilities available at the cinema?</label>
		<div class="content">
			<p> Selecting locations under the cinemas tab will provide you with a list of all our cinemas along with the facilities available there. For more information, please write to us at contact@cinext.com </p>
		</div>

		<input type="checkbox" id="faq9">
		<label for="faq9"> I am trying to make a credit card payment but my transaction keeps getting rejected. What do I do now?</label>
		<div class="content">
			<p> Please check the details entered are correct like the expiration date, CVV and finally the VBV/MSC password. 
			Still, no luck? Please try using alternate payment option. In case issue persists, please connect with the bank.  </p>
		</div>

		<input type="checkbox" id="faq10">
		<label for="faq10"> When I enter my credit card information, the website asks for a CVV code. What is the CVV code?</label>
		<div class="content">
			<p>For Visa and MasterCard credit cards, the CVV is a 3 digit number embossed or imprinted on the reverse side of the card.
			For American Express cards, the CVV is the 4 digit number on the front right-hand side of the card above the card number.
			For State Bank of India (SBI) Cards, the CVV number is printed at the reverse side of the card. This is an extra security measure to ensure that you have access or physical possession of the credit card itself in order to use the CVV code.</p>
		</div>

		<input type="checkbox" id="faq11">
		<label for="faq11"> Do I need to register to book tickets? </label>
		<div class="content">
			<p>Although registering is not a compulsion, we would suggest you to register on our website since it would ensure a smoother user experience.</p>
		</div>
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
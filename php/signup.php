<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if the form was submitted

    $email = $_POST['email'];
    $psw = $_POST['pwd'];
    $username = $_POST['username'];
    $ques = $_POST['sec_ques'];
    $ans = $_POST['sec_ans'];

    if (!empty($email) || !empty($psw) || !empty($ans)) {
        $SELECT = "select email from users where email = ?";
        $INSERT = "insert into users (email, password, username,security_ques,security_ans) values(?, ?, ?, ?, ?)";
        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssss", $email, $psw, $username, $ques, $ans);
            if ($stmt->execute()) {
				header("location: login.php");
                echo "<script>alert('Registered successfully')</script>";
                exit; //added exit to stop further code execution.
            } else {
                echo "<script>alert('Something went wrong. Please try again later.')</script>";
            }
        } else {
            echo "<script>alert('Email already registered!')</script>";
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CiNext-Signup</title>
    <link rel="stylesheet" type="text/css" href="../css/signup.css">
    <script src="https://kit.fontawesome.com/8f6d4e20a8.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/signup.js"></script>
</head>
<body>
<form method="post" id="signup-form" onsubmit="return validate()">
    <pre style="text-align: center;font-size: 20px;">CiNext Signup</pre>
    <div class="container">
        <label for="email"><b>Email</b></label><i class="fas fa-asterisk"></i>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>
        <small id="error1">Error message</small>

        <label for="username"><b>Username</b></label><i class="fas fa-asterisk"></i>
        <input type="text" placeholder="Enter username" name="username" id="username" required>

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

        <button name="signup-submit">Signup</button>
        <label>
            <a href="login.php"> Have an account? Login.</a>
        </label>
    </div>
    <div class="container" style="background-color:#f1f1f1">
        <a href="home.php"><button type="button" class="cancelbtn">Cancel</button></a>
    </div>
</form>
</body>
</html>
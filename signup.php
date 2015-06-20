<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="stylesheet" type="text/css" href="login.css" />
		<title> Sign up account -- Data Bank </title>
	</head>
	<body>
		<h1 class="specialHeader"> Sign up </h1>
		<div>
			<form method="POST" action="signup.php" class="signUpForm">
				<p> Last Name </p>
				<input type="text" placeholder="Smith" class="loginInput" name="lName" />
				<p> First Name </p>
				<input type="text" placeholder="John" class="loginInput" name="fName" />
				<p> Username </p>
				<input type="text" placeholder="John000" class="loginInput" name="uName" />
				<p> Email </p>
				<input type="text" placeholder="John@example.com" class="loginInput" name="uEmail" />
				<p> Password </p>
				<input type="password" class="loginInput" name="uPassword" id="password1" />
				<p> Confirm Password </p>
				<input type="password" class="loginInput" name="confirmPassword" id="passwordRepeat" />
				<input type="submit" name="submitBtn" value="Sign up" />
			</form>
		</div>
		<p> By signing up, you agree to Data Sharer's <a href="#" class="terms"> Terms of Service </a> </p>
	</body>
</html>

<?php 

$mysql_hostname = "107.170.192.241";
$mysql_username = "lmh";
$mysql_password = "88781770";
$mysql_database = "login";

$db = mysql_connect($mysql_hostname,$mysql_username,$mysql_password) or die (mysql_error());
mysql_select_db($mysql_database, $db) or die (mysql_error());

$registered_uname = $_POST["uName"];
$registered_password = $_POST["uPassword"];
$registered_fname = $_POST["fName"];
$registered_lname = $_POST["lName"];
$registered_email = $_POST["uEmail"];
$sql = "INSERT into account values('".$lName."','".$fName."','".$uName."','".$uEmail."','".$uPassword."')";
$query = mysql_query($sql);

if ($submitBtn) {
	$query = "select * from account where name=\"" . $registered_uname . "\";";
	$result = mysql_query($query) or die (mysql_error());
	$result = mysql_fetch_array($result, MYSQL_BOTH);
	if ($result[0] != NULL) {
		echo "The username has already been taken! Please try another.";
	} 
	echo "<script type=\"text/javascript\"> alert(\"You will receive a confirmation email shortly.\"); </script>";
}

?>

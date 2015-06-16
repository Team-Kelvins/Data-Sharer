<!DOCTYPE HTML>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="stylesheet" type="text/css" href="loginStyle.css" />
		<title> User sign in -- Data Bank </title>
	</head>
	<body>
		<h1> Sign in </h1>
		<form method="POST" action="#">
			<input type="text" placeholder="User name or email:" class="loginInput" name="uname" />
			<input type="password" placeholder="Password" class="loginInput" name="upassword" />
			<input type="submit" value="Login" name="submitBtn" href="#"/>
		</form>
		<a href="passwordReset.html"> Forget password? </a>
	</body>
</html>


<?php

$mysql_hostname = "107.170.192.241";
$mysql_username = "lmh";
$mysql_password = "88781770";
$mysql_database = "login";
$db = mysql_connect($mysql_hostname,$mysql_username,$mysql_password) or die (mysql_error());

mysql_select_db($mysql_database, $db) or die (mysql_error());

$username_entered = $_POST["uname"];
$password_entered = $_POST["upassword"];
$submit_btn = $_POST["submitBtn"];

if ($submit_btn) {
	if ($username_entered == "") {
		echo "Please input a username.";
	} else if ($password_entered == "") {
		echo "Please enter your password.";
	} else {
		$query_str = "select password from account where name = \"" . $username_entered . "\";";
		$result = mysql_query($query_str) or die (mysql_error());
		$row = mysql_fetch_array($result, MYSQL_NUM);
		if ($row[0] == $password_entered) {
			echo "<script type=\"text/javascript\"> window.location.replace(\"http://www.datasharer.com/accountPage.html\"); </script>";
		} else {
			echo "<script type=\"text/javascript\"> alert(\"Incorrect password!\"); </script>";
			// echo "<script type=\'text/javascript\'> alert(\'Wrong username/password combination!\'); </script>";
		}
	}
}

?>
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
                <?php
                    createFormElement("text", "Last Name", "Smith", "loginInput", "lName", null);
                    createFormElement("text", "First name", "John", "loginInput", "fName", null);
                    createFormElement("text", "Username", "John000", "loginInput", "uName", null);
                    createFormElement("text", "Email", "John@example.com", "loginInput", "uEmail", null);
                    createFormElement("password", "Password", null, "loginInput", "uPassword", "password1");
                    createFormElement("password", "Confirm Password", null, "loginInput", "confirmPassword", null);
                    createFormSubmit("submitBtn", "Sign up");
                ?>
			</form>
		</div>
		<p> By signing up, you agree to Data Sharer's <a href="#" class="terms"> Terms of Service </a> </p>
	</body>
</html>

<?php
    function createFormElement($type="text", $title, $placeholder, $class, $name, $id) {
        echo "<div class=\"form-element\">";
        if ($title != null) {
            echo $title;
        }
        echo "<input ";
        echo "type=\"$type\" ";
        if ($placeholder != null) {
            echo "placeholder=\"$placeholder\" ";
        }
        if ($class != null) {
            echo "class=\"$class\" ";
        }
        if ($name != null) {
            echo "name=\"$name\" ";
        }
        if ($id != null) {
            echo "id=\"$id\" ";
        }
        echo "/>";
        echo "</div>";
    }

    function createFormSubmit($name, $text) {
        echo "<div class=\"form-element\" \"submit-button\">";
        // TODO add class
        echo "<input type=\"submit\" name=\"$name\" value=\"$text\"/>";
        echo "</div>";
    }
?>

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

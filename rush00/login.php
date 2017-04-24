<?php

include "auth.php";

session_start();

if ($_SESSION['loggued_on_user'] == 'admin'){
	header("Location: admin.php");
	return;
}
if ($_SESSION['loggued_on_user']){
	header("Location: user.php");
	return;
}
if (auth($_POST[login], $_POST[passwd])) {
	$_SESSION['loggued_on_user'] = $_POST[login];
	header("Location: index.php");
}
else
	$_SESSION[loggued_on_user] = NULL;
	// echo "ERROR\n";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel = "stylesheet" href = "style.css" />
	<link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>
<body>
<div class = main>
	<div id = "drova" class = "menu">
	<div class = "home">
		<a href = "index.php">Home</a>
	</div>
	<div class = "header">
		<a href = "basket.php"> Basket</a>
		<a href = "login.php">Login</a>
		<a href = "logout.php">Log out</a>
	</div>
	</div>
	<div class = "form">

		<form class = "form_o" action="login.php" method ="post">
			<input type="text" name="login" placeholder = "Login" value="">
			<br>
			<input type="password" name="passwd" placeholder = "Password" value="">
			<br>
			<input class = "login_button" type="submit" name="submit" value="OK">
		</form>
	</div>
</div>
<div class = "sign">
	<a href = "signup.php">Sign UP</a>
</div>
</body>
</html>
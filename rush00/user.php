<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>User <?=$_SESSION['loggued_on_user'] ?></title>
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
	<div class = "user_container">
		<p>Hello <?=$_SESSION['loggued_on_user'] ?>!</p>
		<p>Here you can change your password and login</p>
	</div>
	<div class = "user_form">
		<form class = "user_form_o" action="modif.php" method ="post">
			<p>Old login: <span><?=$_SESSION['loggued_on_user'] ?></span></p>
			<p>New login: 
			<input class = "user_input" type="text" name="newlog" placeholder = "Login"></p>
			<p> Old password :<input class = "user_input" type="password" name="oldpw" placeholder = "Password"></p>
			<p> New password :<input class = "user_input" type="password" name="newpw" placeholder = "Password"></p>
			<input type="hidden" name="login" value="<?=$_SESSION['loggued_on_user'] ?>">
			<input class = "user_input" type="submit" name="submit" value="Change">
		</form>
	</div>
</div>
</body>
</html>
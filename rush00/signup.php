<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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

		<form class = "form_o" action="create.php" method ="post">
			<input type="text" name="login" placeholder = "Sign Up" value="">
			<br>
			<input type="password" name="passwd" placeholder = "Password" value="">
			<br>
			<input class = "login_button" type="submit" name="submit" value="OK">
		</form>
	</div>
</div>
<div class = "sign">
	<a href = "login.php">Log in</a>
</div>
</body>
</html>
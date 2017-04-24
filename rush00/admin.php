<?php

include "install.php";

session_start();

if ($_SESSION[loggued_on_user] !== "admin") {
	header("Location: index.php");
}
$users = file_get_contents("./data/users");
$users = unserialize($users);

$fd = fopen("./data/data.csv", 'r');

$data = get_data($fd);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
<form class = "admin_form" action="del_usr.php" method="POST">
	<select multiple="multiple" name="delete[]">
		<?php foreach ($users as $key => $value) {
			echo "<option value='".$users[$key][login]."'>".$users[$key][login]."</option>";
		} ?>
	</select>
	<br>
	<input type="submit" name="del" value="Delete">
</form>
<div class="orders">
	<?php
		$key = 0;
		foreach ($users as $key => $value) {
			echo "<p> User ".$users[$key][login]." ordered:</p>";
			foreach ($users[$key][order] as $sd => $value) {
				echo $users[$key][order][$sd]." ";
			}
			echo "<br>";
		}
	?>
</div>
<br>
<div class="orders">
<form action="add_data.php" method="POST">
	<p>Name<input type="text" name="name"></p>
	<p>Black<input type="radio" name = "type" value = "black"></p>
	<p>Green<input type="radio" name = "type" value = "green"></p>
	<p>Image upload<input type="file" name="img"></p>
	<p>Desc<input type="text" name="description"></p>
	<p>Set cost<input type="number" name="cost"></p>
	<input class = "add_button" type="submit" name="del" value="add">
</form>
<form class = "admin_form" action="del_item.php" method="POST">
	<select multiple="multiple" name="delete[]">
		<?php foreach ($data as $key => $value) {
			echo "<option value='".$data[$key][0]."'>".$data[$key][0]."</option>";
		} ?>
	</select>
	<p><input type="submit" name="del" value="Del"></p>
</form>
</div>

</div>
</body>
</html>
<?php

session_start();

include "get_user.php";
include "install.php";

$fd = fopen("./data/data.csv", 'r');

$data = get_data($fd);

function find_data($name, $data)
{
	foreach ($data as $key => $value) {
		if ($data[$key][0] === $name)
			return ($data[$key]);
	}
	return (NULL);
}

$user = get_user();
fclose($fd);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Basket</title>
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
	<div class="all">
		<?php foreach ($user[busket] as $key => $value) { 
			$item = find_data($value, $data);
			?>
		<div class="item">
			<?php echo "<div class='title'>".$item[0]."</div>"; ?>
			<?php echo "<div class='type'>".$item[1]."</div>"; ?>
			<?php echo "<img class='imag' src='".$item[2]."'>"; ?>
			<?php echo "<div class='description'>".$item[3]."</div>"; ?>
			<?php echo "<div class='cost'>".$item[4]."</div>"; ?>
		</div>
		<?php } ?>
	</div>
	

</div>
</body>
</html>
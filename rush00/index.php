<?php

session_start();

include "install.php";

$fd = fopen("./data/data.csv", 'r');

$data = get_data($fd);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tea shop</title>
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
<div class = "filter">
<p></p>
<form class = "category" action="index.php" method="post">
<p><input class = "category_filter" type="radio" value="black" name="type"> Black </p>
<p><input class = "category_filter" type="radio" value="green" name="type"> Green</p>
<p><input class = "category_filter" type="radio" value="all" name="type"> Show all</p>
<p><input class = "number_filter" type="number" name="cost_min" placeholder="PRICE FROM"></p>
<p><input class = "number_filter" type="number" name="cost_max" placeholder="PRICE TO"></p>
<p><input class = "button_filter" type="submit" name="submit" value="search"></p>
</form>
</div>
<div class="all">
    <?php foreach ($data as $key => $value) { ?>
    <div class="item">
        <?php echo "<div class='title'>".$data[$key][0]."</div>"; ?>
        <?php echo "<div class='type'>".$data[$key][1]."</div>"; ?>
        <?php echo "<img class='imag' src = '".$data[$key][2]."'>"; ?>
        <?php echo "<div class='description'>".$data[$key][3]."</div>"; ?>
        <?php echo "<div class='cost'>".$data[$key][4]."</div>"; ?>
<form action="add_item_usr.php" method="POST">
	<input type="hidden" name="item" value="<?=$data[$key][0]?>">
	<input type="submit" name="busket" value="in busket">
	<input type="submit" name="order" value="in order">
</form>
        
    </div>
    <?php } ?>
</div>
</div>

</body>
</html>
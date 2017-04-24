<?php

include "install.php";

$fd = fopen("./data/data.csv", 'r');

$data = get_data($fd);

foreach ($data as $key => $value) {
	if ($_POST[name] === $data[$key][0]) {
		echo "Not added!";
		return;
	}
}

$fd = fopen("./data/data.csv", 'a');

$img = "./data/images/".$_POST[img];



fwrite($fd, $_POST[name].";".$_POST[type].";".$img.";".$_POST[description].";".$_POST[cost]."\n");
fclose($fd);

header("Location: admin.php");

?>
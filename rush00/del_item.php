<?php

include "install.php";

$fd = fopen("./data/data.csv", 'r');
$data = get_data($fd);
fclose($fd);
$fd = fopen("./data/data.csv", 'w');
foreach ($data as $key => $val) {
	foreach ($_POST[delete] as $dl => $value)
	{
		if ($data[$key][0] === $_POST[delete][$dl])
			unset($data[$key]);
	}
}
$key = 0;
foreach ($data as $key => $value)
	fwrite($fd, $data[$key][0].";".$data[$key][1].";".$data[$key][2].";".$data[$key][3].";".$data[$key][4]."\n");
fclose($fd);

header("Location: admin.php");

?>
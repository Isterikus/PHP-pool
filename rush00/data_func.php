<?php

include "install.php";

function del_data($title)
{
	$fd = fopen("./data/data.csv", 'r');
	$data = get_data($fd);
	fclose($fd);
	$fd = fopen("./data/data.csv", 'w');
	foreach ($data as $key => $value) {
		if ($data[$key][0] === $_POST[name])
			unset($data[$key]);
	}
	$key = 0;
	print_r($data);
	foreach ($data as $key => $value)
		fwrite($fd, $data[$key][0].";".$data[$key][1].";".$data[$key][2].";".$data[$key][3].";".$data[$key][4]."\n");
	fclose($fd);
}

function add_data()
{
	$fd = fopen("./data/data.csv", 'a');
	fwrite($fd, $_POST[name].";".$_POST[type].";".base64_encode($_POST[img]).";".$_POST[description].";".$_POST[cost]."\n");
	fclose($fd);
}

?>
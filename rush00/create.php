<?php

include "install.php";

$file_pass = "./data/users";

function error()
{
	echo "ERROR\n";
	exit;
}


$arr = file_get_contents($file_pass);
$arr = unserialize($arr);
if ($_POST[submit]) {
	if (!$_POST[login] || !$_POST[passwd])
		error();
	else {
		$pass = hash("whirlpool", $_POST[passwd]);
		$key = 0;
		while ($arr[$key]) {
			if ($_POST[login] === $arr[$key][login] || $pass === $arr[$key][passwd])
				error();
			$key++;
		}
		$arr[$key][login] = $_POST[login];
		$arr[$key][passwd] = $pass;
		$arr[$key][busket] = array();
		$arr[$key][order] = array();
		$arr = serialize($arr);
		file_put_contents($file_pass, $arr);
		echo "OK\n";
		header("Location: login.php");
	}
}

?>
<?php

$file_pass = "../private/passwd";

function error()
{
	echo "ERROR\n";
	exit;
}

if (file_exists("../private"))
{
	if (file_exists($file_pass))
		if (($arr = file_get_contents($file_pass)) === false)
			error();
}
else if (mkdir("../private") === false)
	error();

if ($_POST[submit]) {
	if ($_POST[submit] !== "OK")
		error();
	else if (!$_POST[login] || !$_POST[passwd])
		error();
	else {
		$arr = unserialize($arr);
		$pass = hash("whirlpool", $_POST[passwd]);
		$key = 0;
		while ($arr[$key]) {
			if ($_POST[login] === $arr[$key][login] || $pass === $arr[$key][passwd])
				error();
			$key++;
		}
		$arr[$key][login] = $_POST[login];
		$arr[$key][passwd] = $pass;
		$arr = serialize($arr);
		file_put_contents($file_pass, $arr);
		echo "OK\n";
	}
}

?>
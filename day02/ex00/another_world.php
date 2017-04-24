#!/usr/bin/php
<?php

if ($argc == 1)
	exit(0);

$arr = spliti("[ \t]+", $argv[1]);

foreach ($arr as $key => $value) {
	if ($key != 0)
		echo " ";
	echo $arr[$key];
}
echo "\n";

?>

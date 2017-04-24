#!/usr/bin/php
<?php

if ($argc != 2) {
	exit(0);
}

$data = file_get_contents($argv[1]);

$out = preg_match_all("/<img(.+?)src=\"(.+?)\"/is", $data, $images);

if ($out === false || $out == 0) {
	exit(0);
}

$dir = "./".substr($argv[1], 7);

if (is_dir(substr($argv[1], 7)) === false)
	if (!mkdir(substr($argv[1], 7)))
		exit(0);

foreach ($images[2] as $key => $value) {
	if (stripos($images[2][$key], "http://") === false) {
		$images[2][$key] = $argv[1].substr($images[2][$key], 1);
	}
}

foreach ($images[2] as $key => $value) {
	$name = strripos($images[2][$key], "/");
	$name = substr($images[2][$key], $name + 1);
	$name = $dir.$name;
	file_put_contents($name, file_get_contents($images[2][$key]));
}

?>

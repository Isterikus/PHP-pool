#!/usr/bin/php
<?php

function ft_split($line) {
	$arr = explode(" ", $line);

	foreach ($arr as $key => $value) {
		if ($value == NULL) {
			unset($arr[$key]);
		}
	}
	return (array_values($arr));
}

function error()
{
	echo "Wrong Format\n";
	exit(0);
}

$month = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
$month_en = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

if ($argc == 1)
	exit(0);
setlocale(LC_TIME, "fr_FR");
$pattern = "/^[A-Z]?[a-z]+ [0-9]{1,2} [A-Z]?[a-zéû]+ [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/";
if (preg_match($pattern, $argv[1]) == 0)
	error();

if (($time = strptime($argv[1], "%A %e %B %Y %T")) === false)
	error();

if ($time["unparsed"] != NULL)
	error();
$arr = ft_split($argv[1]);

$mon = array_search(ucwords($arr[2]), $month);

unset($arr[0]);

$arr[2] = $month_en[$mon];
date_default_timezone_set('Europe/Paris');
$str = implode(" ", $arr);

$int = strtotime($str);
echo "$int\n";
?>

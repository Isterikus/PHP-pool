#!/usr/bin/php
<?php

if ($argc != 2) {
	exit(0);
}
if (!file_exists($argv[1])) {
	exit(0);
}
$str = file_get_contents($argv[1]);
if ($str === false) {
	exit(0);
}

$pattern1 = "/title[ ]?=[ ]?\"(.*?)\"/s";

$pattern2 = "/<a (.*?)<\/a>/s";

$str = preg_replace_callback($pattern1, function ($matches) {
			$pos1 = stripos($matches[0], "\"");
			$ret = substr($matches[0], 0, $pos1 + 1);
			$str = strtoupper(substr($matches[0], $pos1 + 1));
            return $ret.$str;
        }, $str);

$str = preg_replace_callback($pattern2, function ($matches) {
			$new = $matches[0];
			$ret = preg_replace_callback("/>(.*?)</s", function ($mat)
			{
				$test = strtoupper($mat[0]);
				return ($test);
			}, $new);
            return $ret;
        }, $str);

echo "$str";

?>

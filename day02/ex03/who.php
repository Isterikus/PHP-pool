#!/usr/bin/php
<?php

/*
**	https://opensource.apple.com/source/Libc/Libc-583/include/utmpx.h
*/

$fd = fopen("/var/run/utmpx", 'r');
date_default_timezone_set("Europe/Kiev");
while ($str = fread($fd, 628)) {
	$elem = unpack("a256name/a4id/a32user/ipid/itp/Itime", $str);

	if ($elem[tp] == 7) {
		echo "$elem[name] $elem[user]  ".date('M  j H:i ', $elem[time])."\n";
	}

}

?>

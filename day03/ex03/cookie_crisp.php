<?php

if (!$_GET[action]) {
	exit(0);
}

if ($_GET[action] === "set") {
	if ($_GET[name] && $_GET[value]) {
		setcookie($_GET[name], $_GET[value]);
	}
}
else if ($_GET[action] === "get") {
	if ($_GET[name] && $_COOKIE[$_GET[name]]) {
		echo $_COOKIE[$_GET[name]]."\n";
	}
}
else if ($_GET[action] === "del") {
	setcookie($_GET[name], "", time() - 3600);
}

?>
<?php

include "auth.php";

function error()
{
	echo "ERROR\n";
	exit;
}

session_start();

if (auth($_GET[login], $_GET[passwd])) {
	$_SESSION[loggued_on_user] = $_GET[login];
	echo "OK\n";
}
else {
	$_SESSION[loggued_on_user] = NULL;
	echo "ERROR\n";
}

?>
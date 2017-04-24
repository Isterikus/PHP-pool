<?php

include "auth.php";

function error()
{
	echo "ERROR\n";
	exit;
}

session_start();

if (auth($_POST[login], $_POST[passwd])) {
	$_SESSION['loggued_on_user'] = $_POST[login];
	$_SESSION['loggued_on_user_pass'] = $_POST[passwd];
	echo "<iframe name='chat' src='chat.php' width='100%' height='550px' frameborder='1'> </iframe>";
	echo "<iframe name='speak' src='speak.php' width='100%' height='50px' frameborder='1'> </iframe>";
}
else {
	$_SESSION[loggued_on_user] = NULL;
	echo "ERROR\n";
}

?>

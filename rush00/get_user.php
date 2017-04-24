<?php

session_start();

function get_user()
{
	if (!$_SESSION[loggued_on_user])
		return (NULL);

	$users = file_get_contents("./data/users");
	$users = unserialize($users);
	foreach ($users as $key => $value) {
		if ($_SESSION[loggued_on_user] === $users[$key][login]) {
			return ($users[$key]);
		}
	}
	return (NULL);
}

?>
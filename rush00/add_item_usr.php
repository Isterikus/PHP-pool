<?php

session_start();

if ($_SESSION['loggued_on_user']) {
	$users = file_get_contents("./data/users");
	$users = unserialize($users);
	foreach ($users as $key => $value) {
		if ($users[$key][login] == $_SESSION['loggued_on_user']) {
			break ;
		}
	}
	if ($_POST[busket]) {
		$add = count($users[$key][busket]);
		$users[$key][busket][$add] = $_POST[item];
	}
	else if ($_POST[order]) {
		$add = count($users[$key][order]);
		if (!$add)
			$add = 0;
		$users[$key][order][$add] = $_POST[item];
	}
	$users = serialize($users);
	file_put_contents("./data/users", $users);
}
header("Location: index.php");

?>

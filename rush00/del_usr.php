<?php

$users = file_get_contents("./data/users");
$users = unserialize($users);

foreach ($_POST[delete] as $del => $value) {
	foreach ($users as $key => $value) {
		if ($_POST[delete][$del] === $users[$key][login]) {
			unset($users[$key]);
		}
	}
}

$users = serialize($users);
file_put_contents("./data/users", $users);
header("Location: admin.php");

?>
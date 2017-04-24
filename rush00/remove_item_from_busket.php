<?php

session_start();

function remove_item($item)
{
	if ($_SESSION[loggued_on_user]) {
		$users = file_get_contents("./data/users");
		$users = unserialize($users);
		foreach ($users as $key => $value) {
			if ($users[$key][login] == $_SESSION[loggued_on_user]) {
				break ;
			}
		}
		foreach ($users[$key][busket] as $bs => $value) {
			if ($value[$bs] == $item)
				unset($users[$key][busket][$bs]);
		}
		serialize($users);
		file_put_contents("./data/users", $users);
	}
}

?>
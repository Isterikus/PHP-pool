<?php

session_start();

function auth($login, $passwd)
{
	if (($arr = file_get_contents("./data/users")) === false)
		return (false);
	if ($login === NULL || $passwd === NULL)
		return (false);
	else {
		$arr = unserialize($arr);
		$pass = hash("whirlpool", $passwd);
		foreach ($arr as $key => $value) {
			if ($arr[$key][login] === $login && $arr[$key][passwd] === $pass)
				return (true);
		}
		return (false);
	}
}

?>
<?php

session_start();

$file_pass = "./data/users";

function error()
{
	echo "ERROR\n";
	exit;
}

if (($arr = file_get_contents($file_pass)) === false)
	error();

if ($_POST[submit]) {
	if (!$_POST[login] || !$_POST[oldpw] || !$_POST[newpw] || !$_POST[newlog])
		error();
	else {
		$arr = unserialize($arr);
		$pass_old = hash("whirlpool", $_POST[oldpw]);
		$pass_new = hash("whirlpool", $_POST[newpw]);
		$key = 0;
		while ($arr[$key]) {
			if ($_POST[login] === $arr[$key][login])
			{
				if ($pass_old !== $arr[$key][passwd])
					error();
				else
				{
					$arr[$key][login] = $_POST[newlog];
					$arr[$key][passwd] = $pass_new;
					$_SESSION[loggued_on_user] = $_POST[newlog];
					$arr = serialize($arr);
					file_put_contents($file_pass, $arr);
					header("Location: user.php");
					exit;
				}
			}
			$key++;
		}
		echo "ERROR\n";
	}
}

?>
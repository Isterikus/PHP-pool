<?php

include "auth.php";

$file_chat = "../private/char";

session_start();

if (auth($_SESSION['loggued_on_user'], $_SESSION['loggued_on_user_pass'])) {
	if (($fd = fopen($file_chat, 'ab+')) === false || !flock($fd, LOCK_SH))
		header("Location: index.html");
	$chat = file_get_contents($file_chat);
	$chat = unserialize($chat);
	if ($chat) {
		$key = 0;
		while ($chat[$key])
			$key++;
		$key--;
		while ($key >= 0) {
			echo $chat[$key][login]."<br>";
			echo $chat[$key][time]."<br>";
			echo $chat[$key][msg]."<br>";
			echo "<hr>";
			$key--;
		}
	}
	flock($fd, LOCK_UN);
	fclose($fd);
}

?>

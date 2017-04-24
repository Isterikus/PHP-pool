<?php

include "auth.php";

$file_chat = "../private/char";

session_start();

if (auth($_SESSION['loggued_on_user'], $_SESSION['loggued_on_user_pass']) && $_POST[send] == "Send!" && $_POST[msg] !== NULL) {
	if (($fd = fopen($file_chat, 'ab+')) === false || !flock($fd, LOCK_EX))
		header("Location: index.html");
	if (file_exists("../private") && file_exists($file_chat))
		$chat = file_get_contents($file_chat);
	else if (mkdir("../private") === false)
		exit;
	$chat = unserialize($chat);
	$key = 0;
	while ($chat[$key])
		$key++;
	$chat[$key][login] = $_SESSION['loggued_on_user'];
	date_default_timezone_set('Europe/Kiev');
	$chat[$key][time] = date("j M H:i", time());
	$chat[$key][msg] = $_POST[msg];
	$chat = serialize($chat);
	file_put_contents($file_chat, $chat);
	flock($fd, LOCK_UN);
	fclose($fd);
}
else if (!auth($_SESSION['loggued_on_user'], $_SESSION['loggued_on_user_pass']))
	echo "NOT SENT!";

?>
<form action="speak.php" method="POST">
	<input type="text" name="msg" size="100%">
	<input type="submit" name="send" value="Send!">
</form>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
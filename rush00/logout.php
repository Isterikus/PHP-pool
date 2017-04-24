<?php

session_start();

$_SESSION[loggued_on_user] = NULL;
header("Location: login.php");

?>
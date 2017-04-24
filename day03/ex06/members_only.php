<?php

$file = "../img/42.png";

// $_SERVER['PHP_AUTH_USER'] = NULL;
// $_SERVER['PHP_AUTH_PW'] = NULL;

if ($_SERVER['PHP_AUTH_USER'] === "zaz" && $_SERVER['PHP_AUTH_PW'] === "Ilovemylittleponey"){
	$str = file_get_contents($file);
	$str = base64_encode($str);
	$sucsess = "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64,$str'>\n</body></html>\n";
	echo $sucsess;
	exit;
}
else if ($_SERVER['PHP_AUTH_USER'] === NULL && $_SERVER['PHP_AUTH_PW'] === NULL) {
	header("WWW-Authenticate:  Basic realm=''Member area''");
}
header("HTTP/1.0 401 Unauthorized");
echo "<html><body>That area is accessible for members only</body></html>\n";
exit;

?>
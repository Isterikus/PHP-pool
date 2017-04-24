<?php

session_start();

if ($_GET[submit] === "OK") {
	foreach ($_GET as $key => $value) {
		if ($key === 'login')
			$_SESSION['name'] = $_GET[login];
		else if ($key === 'passwd')
			$_SESSION['passwd'] = $_GET[passwd];
	}
}

echo "<html><body>
<form action=\"index.php\" method=\"get\">
Username: <input type=\"text\" name=\"login\" value=\"".$_SESSION['name']."\" />
<br />
Password: <input type=\"text\" name=\"passwd\" value=\"".$_SESSION['passwd']."\" />
<input type=\"submit\" name=\"submit\" value=\"OK\" />
</form>
</body></html>\n";

?>

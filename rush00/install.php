<?php

session_start();

function get_data($fd_data)
{
	$data = array();
	$i = 0;
	while (($data[$i] = fgetcsv($fd_data)) != NULL)
		$i++;
	foreach ($data as $key => $value) {
		if ($data[$key][0] === NULL)
			$data[$key] = NULL;
		else
			$data[$key] = explode(";", $data[$key][0]);
	}
	unset($data[$key]);
	if ($_POST[submit] === NULL || $_POST[type] === "all")
		return ($data);
	else {
		$key = 0;
		foreach ($data as $key => $value) {
			if ($_POST[type] === "black") {
				if ($data[$key][1] !== "black")
					unset($data[$key]);
			}
			else if ($_POST[type] === "green") {
				if ($data[$key][1] !== "green")
					unset($data[$key]);
			}
			if ($_POST[cost_min] or $_POST[cost_max]) {
				if ($_POST[cost_min] and $data[$key][4] < $_POST[cost_min])
					unset($data[$key]);
				if ($_POST[cost_max] and $data[$key][4] > $_POST[cost_max])
					unset($data[$key]);
			}
		}
		return ($data);
	}
}

?>
<?php

class NightsWatch {
	private static	$_arr = array();

	public function recruit($who)
	{
		$this->_arr[] = $who;
	}
	public function fight()
	{
		foreach ($this->_arr as $key => $value) {
			if ($this->_arr[$key] instanceof IFighter) {
				$this->_arr[$key]->fight();
			}
		}
	}
}

?>
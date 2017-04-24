<?

class Lannister {
	public function sleepWith($with)
	{
		if ($this->slp($with) === 0) {
			echo "Not even if I'm drunk !\n";
		}
		else if ($this->slp($with) === 1) {
			echo "Let's do this.\n";
		}
		else {
			echo "With pleasure, but only in a tower in Winterfell, then.\n";
		}
	}
}

?>
<?

class Jaime extends Lannister {
	public function slp($with)
	{
		if (get_class($with) == "Tyrion") {
			return (0);
		}
		else if (get_class($with) == "Sansa") {
			return (1);
		}
		else {
			return (2);
		}
	}
}

?>
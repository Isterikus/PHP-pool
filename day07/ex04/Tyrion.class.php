<?

class Tyrion extends Lannister {
	public function slp($with)
	{
		if (get_class($with) == "Jaime" || get_class($with) == "Cersei") {
			return (0);
		}
		else if (get_class($with) == "Sansa") {
			return (1);
		}
	}
}

?>
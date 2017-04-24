<?php

include_once('../../ex06/Fighter.class.php');

class UnholyFactory {
	private	$_war = array();
	private	$_arm = array();
	private	$_fight = array();

	public function absorb($solj)
	{
		if (get_parent_class($solj)) {
			if (get_class($solj) == "Footsoldier")
					$name = "foot soldier";
				else if (get_class($solj) == "Archer")
					$name = "archer";
				else if (get_class($solj) == "Assassin")
					$name = "assassin";
				else
					$name = "crippled soldier";
			if (array_search($solj, $this->_war) === false) {
				$this->_war[$name] = $solj;
				array_push($this->_arm, $name);
				echo "(Factory absorbed a fighter of type $name)\n";
			}
			else {
				echo "(Factory already absorbed a fighter of type $name)\n";
			}
		}
		else {
			echo "(Factory can't absorb this, it's not a fighter)\n";
		}
	}
	public function fabricate($solj)
	{
		if (array_search($solj, $this->_arm) !== false) {
			// array_push($this->_fight, $this->_war[$solj]);
			echo "(Factory fabricates a fighter of type $solj)\n";
			return ($this->_war[$solj]);
		}
		else {
			echo "(Factory hasn't absorbed any fighter of type $solj)\n";
			return (NULL);
		}
	}
	public function __construct()
	{
		
	}
}

?>
<?php

class Color
{
	public 			$red;
	public 			$green;
	public 			$blue;
	public static 	$verbose = False;

	public static function doc()
	{
		echo file_get_contents("Color.doc.txt");
	}
	public function __construct($arr)
	{
		if ($arr[rgb]) {
			$arr[rgb] = (int)$arr[rgb];
			$this->red = ($arr[rgb] & 0xff0000) >> 16;
			$this->green = ($arr[rgb] & 0x00ff00) >> 8;
			$this->blue = $arr[rgb] & 0x0000ff;
		}
		else
		{
			$this->red = (int)$arr[red];
			$this->green = (int)$arr[green];
			$this->blue = (int)$arr[blue];
		}
		if (self::$verbose === true)
			echo "Color( red:	$this->red,	green:	$this->green,	blue:	$this->blue ) constructed.\n";
	}
	public function __destruct()
	{
		if (self::$verbose === true)
			echo "Color( red:	$this->red,	green:	$this->green,	blue:	$this->blue ) destructed.\n";
	}
	public function __toString()
	{
		return ("Color( red:	" . $this->red . ",	green:	" . $this->green . ",	blue:	" . $this->blue . " )");
	}
	public function add($cl)
	{
		$red = $this->red + $cl->red;
		$green = $this->green + $cl->green;
		$blue = $this->blue + $cl->blue;
		$new = new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
		return ($new);
	}
	public function sub($cl)
	{
		$red = $this->red - $cl->red;
		$green = $this->green - $cl->green;
		$blue = $this->blue - $cl->blue;
		$new = new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
		return ($new);
	}
	public function mult($mul)
	{
		$red = $this->red * $mul;
		$green = $this->green * $mul;
		$blue = $this->blue * $mul;
		$new = new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
		return ($new);
	}
}

?>
<?php

require_once '../ex00/Color.class.php';

class Vertex
{
	private 		$_x;
	private 		$_y;
	private 		$_z;
	private			$_w;
	private			$_color;
	public static 	$verbose = False;

	public static function doc()
	{
		echo file_get_contents("Vertex.doc.txt");
	}
	public function __construct($arr)
	{
		if (array_key_exists('color', $arr))
			$this->_color = $arr[color];
		else
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		if (array_key_exists('w', $arr))
			$this->_w = $arr[w];
		else
			$this->_w = 1.0;
		$this->_x = (float)$arr[x];
		$this->_y = (float)$arr[y];
		$this->_z = (float)$arr[z];
		if (self::$verbose === true)
			echo "Vertex( x:	".number_format((float)$this->_x, 2, '.', '').", y:	".number_format((float)$this->_y, 2, '.', '').", z:	".number_format((float)$this->_z, 2, '.', '').", w:	".number_format((float)$this->_w, 2, '.', '').",	". $this->_color." ) constructed\n";
	}
	public function __destruct()
	{
		if (self::$verbose === true)
			echo "Vertex( x:	".number_format((float)$this->_x, 2, '.', '').", y:	".number_format((float)$this->_y, 2, '.', '').", z:	".number_format((float)$this->_z, 2, '.', '').", w:	".number_format((float)$this->_w, 2, '.', '').",	". $this->_color." ) destructed\n";
	}
	public function __toString()
	{
		if (self::$verbose === true)
			return ("Vertex( x:	" . number_format((float)$this->_x, 2, '.', '') . ", y:	" . number_format((float)$this->_y, 2, '.', '') . ", z:	" . number_format((float)$this->_z, 2, '.', '') . ", w:	".number_format((float)$this->_w, 2, '.', '').",	". $this->_color. " )");
		else
			return ("Vertex( x:	" . number_format((float)$this->_x, 2, '.', '') . ", y:	" . number_format((float)$this->_y, 2, '.', '') . ", z:	" . number_format((float)$this->_z, 2, '.', '') . ", w:	".number_format((float)$this->_w, 2, '.', '')." )");
	}
	public function get_x()
	{
		return ($this->_x);
	}
	public function get_y()
	{
		return ($this->_y);
	}
	public function get_z()
	{
		return ($this->_z);
	}
	public function get_w()
	{
		return ($this->_w);
	}
	public function get_color()
	{
		return ($this->_color);
	}
}

?>
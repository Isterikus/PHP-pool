<?php

class Vector
{
	private 		$_x;
	private 		$_y;
	private 		$_z;
	private			$_w;
	private			$_color;
	public static 	$verbose = False;

	public static function doc()
	{
		echo file_get_contents("Vector.doc.txt");
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
	public function __construct($arr)
	{
		if (array_key_exists('orig', $arr))
		{
			$this->_x = $arr[dest]->get_x() - $arr[orig]->get_x();
			$this->_y = $arr[dest]->get_y() - $arr[orig]->get_y();
			$this->_z = $arr[dest]->get_z() - $arr[orig]->get_z();
		}
		else
		{
			$orig = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z'=> 0.0));
			$this->_x = $arr[dest]->get_x() - $orig->get_x();
			$this->_y = $arr[dest]->get_y() - $orig->get_y();
			$this->_z = $arr[dest]->get_z() - $orig->get_z();
		}
		if (array_key_exists('w', $arr))
			$this->_w = $arr[w];
		else
			$this->_w = 0.0;
		if (self::$verbose === true)
			echo "Vector( x:	".number_format((float)$this->_x, 2, '.', '').", y:	".number_format((float)$this->_y, 2, '.', '').", z:	".number_format((float)$this->_z, 2, '.', '').", w:	".number_format((float)$this->_w, 2, '.', '')." ) constructed\n";
	}
	public function __destruct()
	{
		if (self::$verbose === true)
			echo "Vector( x:	".number_format((float)$this->_x, 2, '.', '').", y:	".number_format((float)$this->_y, 2, '.', '').", z:	".number_format((float)$this->_z, 2, '.', '').", w:	".number_format((float)$this->_w, 2, '.', '')." ) destructed\n";
	}
	public function __toString()
	{
		return ("Vector( x:	" . number_format((float)$this->_x, 2, '.', '') . ", y:	" . number_format((float)$this->_y, 2, '.', '') . ", z:	" . number_format((float)$this->_z, 2, '.', '') . ", w:	".number_format((float)$this->_w, 2, '.', '')." )");
	}
	public function magnitude()
	{
		return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
	}
	public function normalize()
	{
		$magn = $this->magnitude();
		$x = $this->_x / $magn;
		$y = $this->_y / $magn;
		$z = $this->_z / $magn;
		$new = new Vector(array('dest' => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
		return ($new);
	}
	public function add($rhs)
	{
		$x = $this->_x + $rhs->_x;
		$y = $this->_y + $rhs->_y;
		$z = $this->_z + $rhs->_z;
		$new = new Vector(array('dest' => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
		return ($new);
	}
	public function sub($rhs)
	{
		$x = $this->_x - $rhs->_x;
		$y = $this->_y - $rhs->_y;
		$z = $this->_z - $rhs->_z;
		$new = new Vector(array('dest' => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
		return ($new);
	}
	public function opposite()
	{
		$x = -$this->_x;
		$y = -$this->_y;
		$z = -$this->_z;
		$new = new Vector(array('dest' => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
		return ($new);
	}
	public function scalarProduct($k)
	{
		$x = $this->_x * $k;
		$y = $this->_y * $k;
		$z = $this->_z * $k;
		$new = new Vector(array('dest' => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
		return ($new);
	}
	public function dotProduct($rhs)
	{
		$x = $this->_x * $rhs->_x;
		$y = $this->_y * $rhs->_y;
		$z = $this->_z * $rhs->_z;
		return ($x + $y + $z);
	}
	public function cos($rhs)
	{
		$len = $this->magnitude() * $rhs->magnitude();
		$dob = $this->dotProduct($rhs);
		return ($dob / $len);
	}
	public function crossProduct($rhs)
	{
		$x = ($this->_y * $rhs->_z) - ($this->_z * $rhs->_y);
		$y = ($this->_z * $rhs->_x) - ($this->_x * $rhs->_z);
		$z = ($this->_x * $rhs->_y) - ($this->_y * $rhs->_x);
		$new = new Vector(array('dest' => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
		return ($new);
	}
}

?>
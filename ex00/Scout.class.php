<?php

include_once('Ship.class.php');

class Scout extends Ship {

	public function __construct($x, $y) {
		parent::__construct( array ( 'name' => 'scout'
									, 'x' => $x
									, 'y' => $y
									, 'width' => 1
									, 'height' => 1
									, 'max_health' => 10
									, 'shield' => 5
									, 'pp' => 5
									, 'image_file' => 'scout.png'
									, 'speed' => 15
									,  'manoeuvre' => 4));
	}
	
	public function fight() {
		print ("fires gun " . PHP_EOL);
	}
	
	public function __toString() {
		return "Scout" . parent::__toString();
	}
}

?>
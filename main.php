<?php

include_once('Ship.class.php');

class Scout extends Ship {

	public function __construct($x, $y) {
		parent::__construct( array ('x' => $x
									, 'y' => $y
									, 'width' => 1
									, 'height' => 1
									, 'health' => 10
									, 'shield' => 5 ) );
	}
	
	public function fight() {
		print ("fires gun " . PHP_EOL);
	}
	
	public function __toString() {
		return "Scout" . parent::__toString();
	}
}

class Arena {
	public $width;
	public $height;
	public $onScreens = array();

	public function __construct() {
		$this->width = 100;
		$this->height = 150;
	}

	public function addShip($ship) {
		$this->onScreens[] = $ship;
	}
	
	public function getTileContents($x, $y) {
		foreach ( $this->onScreens as $current ) {
			if ($current->isOccupying($x, $y)) {
				return $current;
			}
		}
		return null;
	}
	
	public function __toString() {
		$drawables = "";
		foreach( $this->onScreens as $current ) {
			$drawables = $drawables . " " . $current;
		}
		return sprintf("Arena[ width: %d ; height: %d ; onScreens: [%s]"
						, $this->width, $this->height, $drawables);
	}
	
	public function isInBounds($x, $y) {
		return ($x >= 0 && $x < $this->width && $y >= 0 && $y < $this->height);
	}
}

# start of 'main' bit

$arena = new Arena();

$arena->addShip( new Scout(10, 10) );
$arena->addShip( new Scout(10, 50) );

print_r($arena);

?>
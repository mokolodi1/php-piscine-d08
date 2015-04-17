<?php

include_once('OnScreen.class.php');

class Arena {
	private $width;
	private $height;
	private $onScreens = array();

	public function __construct() {
		$this->width = 120;
		$this->height = 40;
	}

	public function addOnScreen($ship) {
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
		foreach( $this->getOnScreens() as $current ) {
			$drawables = $drawables . " " . $current;
		}
		return sprintf("Arena[ width: %d ; height: %d ; onScreens: [%s]"
						, $this->width, $this->height, $drawables);
	}
	
	public function isInBounds($x, $y) {
		return ($x >= 0 && $x < $this->width && $y >= 0 && $y < $this->height);
	}

	public function destroyShip($ship) {
		if (($key = array_search($ship, $this->onScreens)) !== false){	
 			   unset($this->onScreens[$key]);
 			   	error_log("Destroyed ship");
			}
	}

	public function getHeight() {		return $this->height;		}
	public function getWidth() {		return $this->width;		}
	public function getOnScreens() {	return $this->onScreens;	}
}

?>
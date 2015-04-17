<?php

include_once('Ship.class.php');
include_once ('Weapon.class.php');

class Scout extends Ship {

	use Flanklaser;

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

	public function fight(array $kwargs) {
		$ship = $this->type($kwargs['dice_roll'], $kwargs['width'],
			$kwargs['position_x'], $kwargs['position_y'], $kwargs['arena']);
		if ($ship == NULL)
			print ("It's NULL\n");
		else {
			$ship->ShipisShot($kwargs['arena']);
			print_r($kwargs['arena']->onScreens);
		}
	}
	
	public function __toString() {
		return "Scout" . parent::__toString();
	}
}

?>
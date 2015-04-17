<?php

include_once('Ship.class.php');
include_once ('Flanklaser.class.php');

class Scout extends Ship {

	use FlankLaser;

	# Teo: this has another thing called $name to specify between first and second. Maybe we should call this $team later?
	public function __construct($x, $y, $name) {
		parent::__construct( array ( 'name' => $name
									, 'x' => $x
									, 'y' => $y
									, 'width' => 1
									, 'height' => 1
									, 'max_health' => 10
									, 'shield' => 5
									, 'pp' => 5
									, 'speed' => 15
									, 'agility' => 4));
	}

	public function fight(array $kwargs) {
		$ship = $this->type($kwargs['dice_roll'], $kwargs['width'],
			$kwargs['position_x'], $kwargs['position_y'], $kwargs['arena']);
		if ($ship == NULL)
			print ("It's NULL\n");
		else {
			$ship->shipIsShot($kwargs['arena']);
			print_r($kwargs['arena']->getOnScreens());
		}
	}
	
	public function __toString() {
		return "Scout" . parent::__toString();
	}
}

?>
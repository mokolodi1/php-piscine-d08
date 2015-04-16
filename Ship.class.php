<?php

include_once('OnScreen.class.php');

abstract class Ship extends OnScreen {
	
	public $health;
	public $default_shield;
	public $shield;

	public function __construct( array $kwargs ) {
		parent::__construct( $kwargs );
		$this->health = $kwargs['health'];
		$this->default_shield = $kwargs['shield'];
	}
	
	public function beginningOfTurn() {
		$this->shield = $this->default_shield;
	}
	
	public abstract function fight();
	
	public function __toString() {
		return sprintf( "[ health: %d ; default_shield: %d ; position (%d, %d) ]",
		$this->health, $this->default_shield, $this->position_x, $this->position_y);
	}
	
	public function getGunLocation() {
		# returns gun location on the ship
	}
	
	public function canFireAt( $otherShip ) {
		# to code this
	}
}

?>
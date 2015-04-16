<?php

include_once('OnScreen.class.php');

abstract class Ship extends OnScreen {
	
	public $health;
	public $defaultShield;
	public $shield;
	public $pointsDePuissance;

	public function __construct( array $kwargs ) {
		parent::__construct( $kwargs );
		$this->health = $kwargs['health'];
		$this->defaultShield = $kwargs['shield'];
		$this->pointsDePuissance = $kwargs['pp'];
	}
	
	public function beginningOfTurn() {
		$this->shield = $this->default_shield;
	}
	
	public abstract function fight();
	
	public function __toString() {
		return sprintf( "[ health: %d ; default_shield: %d ; position (%d, %d) ]",
		$this->health, $this->default_shield, $this->position_x, $this->position_y);
	}
}

?>
<?php

include_once('OnScreen.class.php');

abstract class Ship extends OnScreen {
	
	
	public $name;
	public $max_health;
	public $health;
	public $default_shield;
	public $shield;
	public $speed;
	public $manoeuvre;

	public function __construct( array $kwargs ) {
		parent::__construct( $kwargs );
		
		if ( !isset( $kwargs['name'] ) 
				|| !isset( $kwargs['max_health'] )
				|| !isset( $kwargs['shield'] )
				|| !isset( $kwargs['pp'] ) 
				|| !isset( $kwargs['speed'])
				|| !isset( $kwargs['manoeuvre'])) {
			error_log("Ship error: incorrect parameters to constructor"
						. PHP_EOL );
			exit(1);
		}
		
		$this->name = $kwargs['name'];
		$this->max_health = $kwargs['max_health'];
		$this->defaultShield = $kwargs['shield'];
		$this->pointsDePuissance = $kwargs['pp'];
		$this->shield = $kwargs['shield'];
		
		# setup for start of game
		$this->health = $this->max_health;
	}
	
	# should be called at the beginning of each turn to reset things
	public function beginningOfTurn() {
		$this->shield = $this->default_shield;
	}

	public abstract function fight(array $kwargs);
	
	public function __toString() {
		return sprintf( "%s[ health: %d ; default_shield: %d ; position (%d, %d) ]"
						, $this->name, $this->health, $this->default_shield
						, $this->position_x, $this->position_y);
	}
	
	public function isInLimits($arena)
	{
		#check if the ship has gone out of screen
		if($this->position_x < 0 || $this->position_x > $arena->width
			|| $this->position_y < 0 || $this->position_y > $arena->height)
			{
				$this->DestroyShip($arena);
				return FALSE;
			}
		return TRUE;
	}

	public function ShipisShot($arena) { 
		if ($this->shield == 0)
			$this->health = $this->health - 1;
		else
			$this->shield = $this->shield - 1;
		if ($this->health <= 0)
		{
			$this->DestroyShip($arena);
		}
	}

	public function DestroyShip($arena) {
		if (($key = array_search($this, $arena->onScreens)) !== false){	
 			   unset($arena->onScreens[$key]);
 			   	echo "Destroyed ship\n";
			}
	}

	public function move($x, $y, $arena) {
		error_log('move called');
		$this->position_x += $x;
		$this->position_y += $y;
		if ($this->isInLimits($arena) == TRUE)
		{
			$this->position_x -= $x;
			$this->position_y -= $y;
			if ($arena->getTileContents($this->position_x + $x, $this->position_y + $y) !== NULL) {
				$this->DestroyShip($arena);
			} else {
				error_log('actually moved something');
				$this->position_x += $x;
				$this->position_y += $y;
				error_log('new x = ' . $this->position_x);
				error_log('new y = ' . $this->position_y);
			}
		}
	}
} 

?>
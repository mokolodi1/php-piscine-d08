<?php

 class OnScreen {
/*
	const ROTATION_0 = 0; # pointing upwards
	const ROTATION_90 = 1; # pointing right
	const ROTATION_180 = 2; # pointing down
	const ROTATION_270 = 3; # pointing left
*/
	# position_x/y is the top left corner
	protected $position_x;
	protected $position_y;
	protected $width;
	protected $height;

	public function __construct( array $kwargs ) {
		if ( !isset( $kwargs['x'] )
				|| !isset( $kwargs['y'] )
				|| !isset( $kwargs['width'] )
				|| !isset( $kwargs['height'] ) ) {
			error_log("OnScreen error: incorrect parameters to constructor"
						. PHP_EOL );
			exit(1);
		}
		$this->position_x = $kwargs['x'];
		$this->position_y = $kwargs['y'];
		$this->width = $kwargs['width'];
		$this->height = $kwargs['height'];
		
/*		$this->rotation = OnScreen::ROTATION_0;*/
	}
	
	public function isOccupying($x, $y) {
		# returns whether the OnScreen is over ($x, $y)
		return ( $x >= $this->position_x
				&& $x < $this->position_x + $this->width
				&& $y >= $this->position_y
				&& $y < $this->position_y + $this->height);
		# this needs to change when we add rotation
	}

	public function getPositionX() {
		return $this->position_x;
	}

	public function getPositionY() {
		return $this->position_y;
	}

	public function getWidth() {
		return $this->width;
	}

	public function getHeight() {
		return $this->height;
	}
}

?>
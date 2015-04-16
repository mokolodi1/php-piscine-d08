<?php

class OnScreen {

	# position_x/y is the top left corner
	public $position_x;
	public $position_y;
	public $width;
	public $height;
	# no rotation for now (figure out how to do this)
	
	public function __construct( array $kwargs ) {
		$this->position_x = $kwargs['x'];
		$this->position_y = $kwargs['y'];
		$this->width = $kwargs['width'];
		$this->height = $kwargs['height'];
	}
	
	public function isOccupying($x, $y) {
		# returns whether the OnScreen is over ($x, $y)
		return ( $x >= $this->position_x
				&& $x < $this->position_x + $this->width
				&& $y >= $this->position_y
				&& $y < $this->position_y + $this->height);
	}
	
	

}

?>
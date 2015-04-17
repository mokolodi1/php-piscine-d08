<?php

 class OnScreen {

	const ROTATION_0 = 0; # pointing upwards
	const ROTATION_90 = 1; # pointing right
	const ROTATION_180 = 2; # pointing down
	const ROTATION_270 = 3; # pointing left

	# position_x/y is the top left corner
	public $position_x;
	public $position_y;
	public $width;
	public $height;
	public $image_file;
	public $rotation;

	public function checkFitScreen( array $kwargs) #doesn't work when I call it, Can someone chek it?
	{
		$good_pos = 1;
		if (150 < $kwargs['x'] || $kwargs['x'] < 0)
			$good_pos = 0;
		else if (100 < $kwargs['y'] || $kwargs['y'] < 0)
			$good_pos = 0;
		else if (150 < $kwargs['x'] + $kwargs['width'] || $kwargs['width'] == 0)
			$good_pos = 0;
		else if (100 < $kwargs['y'] + $kwargs['height'] || $kwargs['height'] == 0)
			$good_pos = 0;
		if ($good_pos === 0)
			return FALSE;
		else
			return TRUE;
	}

	public function __construct( array $kwargs ) {
		if ( !isset( $kwargs['x'] )
				|| !isset( $kwargs['y'] )
				|| !isset( $kwargs['width'] )
				|| !isset( $kwargs['height'] )
				|| !isset( $kwargs['image_file'] )) {
			error_log("OnScreen error: incorrect parameters to constructor"
						. PHP_EOL );
			exit(1);
		}
		$this->position_x = $kwargs['x'];
		$this->position_y = $kwargs['y'];
		$this->width = $kwargs['width'];
		$this->height = $kwargs['height'];
		$this->image_file = $kwargs['image_file'];
		
		$this->rotation = OnScreen::ROTATION_0;
	}
	
	public function isOccupying($x, $y) {
		# returns whether the OnScreen is over ($x, $y)
		return ( $x >= $this->position_x
				&& $x < $this->position_x + $this->width
				&& $y >= $this->position_y
				&& $y < $this->position_y + $this->height);
		# this needs to change when we add rotation
	}

	public function rotateClockwise() {
		$this->rotation += 1;
		if ( $this->rotation > OnScreen::ROTATION_270 ) {
			$this->rotation = OnScreen::ROTATION_0;
		}
	}
	
	public function rotateCounterclockwise() {
		$this->rotation -= 1;
		if ( $this->rotation < OnScreen::ROTATION_0 ) {
			$this->rotation = OnScreen::ROTATION_270;
		}
	}
	
	

}

?>
<?php


include_once('Arena.class.php');

trait FlankLaser {

#Order decides number of charges [i.e number of times the dice is rolled]
#diceRoll decides range

	public $charges = 0;
	public $short = 10;
	public $medium = 20;
	public $long = 30;
	
	private $_spray;
	private $_range;
	private $_xpoint = 0;
	private $_ypoint = 1;
	
	#General for all weapons
	public function get_range($dice_roll) {
		if ($dice_roll === "short")
			return ($this->short);
		else if ($dice_roll === "medium")
			return ($this->medium);
		else
			return ($this->long);
	}
	
	#Specific for this one
	public function type($dice_roll, $width, $position_x, $position_y, $arena) {
		$this->_range = $this->get_range($dice_roll);
		while ($this->_ypoint <= $this->_range) 
		{
			$this->_spray = $width + $this->_ypoint - 1;
			$this->_xpoint = 0 - $this->_ypoint - 1;
			while ($this->_xpoint < $this->_spray)
			{	
				if ($arena->getTileContents($position_x + $this->_xpoint, $position_y + $this->_ypoint) !== NULL)
					return ($arena->getTileContents($position_x + $this->_xpoint, $position_y + $this->_ypoint));
				$this->_xpoint++;
			}
			$this->_ypoint++;
		}
	}
}
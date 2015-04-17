<?php


include_once('Arena.class.php');

trait FlankLaser {

#Order decides number of charges [i.e number of times the dice is rolled]
#diceRoll decides range

	private static $charges = 0;
	private static $short = 10;
	private static $medium = 20;
	private static $long = 30;

	#General for all weapons
	private function get_range($dice_roll) {
		if ($dice_roll === "short")
			return ($this->short);
		else if ($dice_roll === "medium")
			return ($this->medium);
		else
			return ($this->long);
	}
	
	private function set_direction($direction)
	{
		if ($direction === "shoot_down")
		{
			return 1;
		}
		else
			return -1;
	}

	#Specific for this one
	public function type($dice_roll, $width, $position_x, $position_y, $arena, $direction_string) {
		$range = $this->get_range($dice_roll);
		$direction = $this->set_direction($direction_string);
		$ypoint = $direction;
		$xpoint = 0;
		while (abs($ypoint) <= $range) 
		{
			$spray = $width + abs($ypoint) - 1;
			$xpoint = 0 - abs($ypoint) - 1;
			while ($xpoint < $spray)
			{
				if ($arena->getTileContents($position_x + $xpoint, $position_y + $ypoint) !== NULL)
					return ($arena->getTileContents($position_x + $xpoint, $position_y + $ypoint));
				$xpoint++;
			}
			$ypoint += $direction;
		}
		return NULL;
	}
}
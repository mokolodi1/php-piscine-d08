<?php

include_once('Arena.class.php');
include_once('Scout.class.php');


# start of 'main' bit

$arena = new Arena();

$arena->addOnScreen( new Scout(10, 44) );
$arena->addOnScreen( new Scout(10, 50) );


$arena->onScreens[0]->fight(array("dice_roll" => "short", "width" => $arena->onScreens[0]->width,
	"position_x" => $arena->onScreens[0]->position_x, "position_y" => $arena->onScreens[0]->position_y,
	 "arena" => $arena));



?>
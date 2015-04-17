<?php

include_once('Arena.class.php');
include_once('Scout.class.php');

session_start();

function getShipByName($name, $arena) {
	foreach ( $arena->getOnScreens() as $current ) {
		if ( $name === $current->getName() ) {
			return $current;
		}
	}
	error_log('ship not found in getShipByName (move.php)');
	return null;
}


$direction_shoot = $_POST['shoot'];

$shipThatShoots = getShipByName($_POST['name'], $_SESSION['arena']);
if ($shipThatShoots)
{
	error_log("shooting down");
	$shipThatShoots->fight(array("dice_roll" => "short"
							, "width" => $shipThatShoots->getWidth()
							, "position_x" => $shipThatShoots->getPositionX()
							, "position_y" => $shipThatShoots->getPositionY()
							, "arena" => $_SESSION['arena']));
}

header('Location: index.php');

?>
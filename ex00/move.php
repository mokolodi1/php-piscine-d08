<?php

# calls move for the correct ship

session_start();

function getShipByName(String $name, Arena $arena) {
	foreach ( $arena->onScreens as $current ) {
		if ( $name === $current->name ) {
			return $current;
		}
	}
	error_log('ship not found in getShipByName (move.php)');
	return null;
}

$shipToMove = getShipByName($_POST['name'], $_SESSION['arena']);

$exploded = explode(',', $_POST['move']);
$delta_x = $exploded[0];
$delta_y = $exploded[1];

$shipToMove->move($delta_x, $delta_y, $_SESSION['arena']);

header('Location: index.php');

?>
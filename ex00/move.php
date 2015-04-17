<?php

# calls move for the correct ship

include_once('Arena.class.php');
include_once('Scout.class.php');

session_start();

function getShipByName($name, $arena) {
	foreach ( $arena->onScreens as $current ) {
		if ( $name === $current->name ) {
			return $current;
		}
	}
	error_log('ship not found in getShipByName (move.php)');
	return null;
}

# debugging
?>
<pre>
<?php print_r($_SESSION['arena']); ?>
</pre>
<?php


$shipToMove = getShipByName($_POST['name'], $_SESSION['arena']);

$exploded = explode(',', $_POST['move']);
$delta_x = intval($exploded[0]);
$delta_y = intval($exploded[1]);

$shipToMove->move($delta_x, $delta_y, $_SESSION['arena']);

error_log('delta x: ' . $delta_x);
error_log('delta y: ' . $delta_y);

header('Location: index.php');

?>
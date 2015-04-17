<?php

# calls move for the correct ship

include_once('Arena.class.php');
include_once('Scout.class.php');

session_start();

function getShipByName($name, $arena) {
	foreach ( $arena->getOnScreens() as $current ) {
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

$exploded = explode(',', $_POST['move']);
$delta_x = intval($exploded[0]);
$delta_y = intval($exploded[1]);


$shipToMove = getShipByName($_POST['name'], $_SESSION['arena']);
if ($shipToMove)
	$shipToMove->move($delta_x, $delta_y, $_SESSION['arena']);

header('Location: index.php');

?>
<?php

session_start();

include_once('Arena.class.php');
include_once('Scout.class.php');

# start of 'main' bit


$arena = new Arena();



$scoutA = new Scout(0, 0);
$arena->addShip( $scoutA );
// $arena->addShip( new Scout(5, 10) );

print_r($_GET);

function setCurrentPosition(Scout $scout, $x, $y)
{
	$scout->position_x = $x;
	$scout->position_y = $y;
}

$_SESSION['xA'] = $_GET['xA'];
$_SESSION['yA'] = $_GET['yA'];
$xA = intval($_SESSION['xA']);
echo $scoutA->position_x;
$yA = intval($_SESSION['yA']);
echo $scoutA->position_y;

setCurrentPosition($scoutA, $xA, $yA);

function giveShipClass($x, $y, $arena) {
	foreach ( $arena->onScreens as $current ) {
		if ( $current->position_x === $y && $current->position_y === $x ) {
			return $current->name;
		}
	}
	return "empty";
}


?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="game.css"></head>
</head>
<body>
	<table>
<?php
		$row = 0;

		while ($row < $arena->height) {
			$column = 0;
?>
			<tr>
<?php
			while ( $column < $arena->width ) {
?>
				<td class="<?= giveShipClass($row, $column, $arena)?>"></td>
<?php
				$column++;
			}
?>
			</tr>
<?php
			$row++;
		}
?>
</table>

	<form action="moveShip.php" method="post">
	<div>
		<input name="move" value="moveUp" type="submit" />
	</div>
	<div>
		<input name="move" value="moveLeft" type="submit" />
		<input name="move" value="moveRight" type="submit" />
	</div>
	<div>
		<input name="move" value="moveDown" type="submit" />
	</div>
	</form>
</body>
</html>

<?php
	// session_destroy();
?>

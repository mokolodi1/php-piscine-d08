<?php

include_once('Arena.class.php');
include_once('Scout.class.php');

if (session_status() == PHP_SESSION_NONE) {
	$arena = new Arena();

	$arena->addShip( new Scout(0, 0, 'a') );
	$arena->addShip( new Scout(10, 10, 'b') );
    session_start();
    $_SESSION['arena'] = $arena;
}

function getShipName($x, $y, $arena) {
	foreach ( $arena->onScreens as $current ) {
		if ( $current->isOccupying($x, $y) ) {
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
				<td class="<?= getShipName($column, $row, $arena)?>"></td>
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
	<p> MOVING SHIP A </p><br/>
	<form action="move.php" method="POST">
		<input type="hidden" name="name" value="a">
		<div>
			<input name="move" value="0, -1" type="submit" />
		</div>
		<div>
			<input name="move" value="-1, 0" type="submit" />
			<input name="move" value="1, 0" type="submit" />
		</div>
		<div>
			<input name="move" value="0, 1" type="submit" />
		</div>
	</form>
	
	<p> MOVING SHIP B </p><br/>
	<form action="move.php" method="POST">
		<input type="hidden" name="name" value="b">
		<div>
			<input name="move" value="0, -1" type="submit" />
		</div>
		<div>
			<input name="move" value="-1, 0" type="submit" />
			<input name="move" value="1, 0" type="submit" />
		</div>
		<div>
			<input name="move" value="0, 1" type="submit" />
		</div>
	</form>
</body>
</html>


<?php

include_once('Arena.class.php');
include_once('Scout.class.php');
include_once('resetGame.php');

session_start();

if (!isset($_SESSION['arena'])) {
	resetGame();
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

		while ($row < $_SESSION['arena']->height) {
			$column = 0;
?>
			<tr>
<?php
			while ( $column < $_SESSION['arena']->width ) {
?>
				<td class="<?= getShipName($column, $row, $_SESSION['arena'])?>"></td>
<?php
				$column++;
			}
?>
			</tr>
<?php
			$row++;
		}
?>

<pre>
<?php print_r($_SESSION['arena']); ?>
</pre>

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
	<form action="reset.php" method="POST">
		<input name="reset" value="reset" type="submit" />
	</form>
</body>
</html>


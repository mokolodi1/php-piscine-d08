<?php

session_start();

include_once('Arena.class.php');
include_once('Scout.class.php');

# start of 'main' bit

$arena = new Arena();

$arena->addShip( new Scout(5, 5) );
$arena->addShip( new Scout(5, 10) );

function onScreenStartsHere($x, $y, $arena) {
	foreach ( $arena->onScreens as $current ) {
		if ( $current->position_x === $x && $current->position_y === $y ) {
			return $current->image_file;
		}
	}
	return FALSE;
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
			echo "<tr>";
			while ( $column < $arena->width ) {
				echo "<td>";
				$starts_here = onScreenStartsHere($row, $column, $arena);
				if ( $starts_here !== FALSE ) {
					echo '<img src="images/' . $starts_here . '" />';
				}
				echo "</td>";
				$column++;
			}
			echo "</tr>";
			$row++;
		}
		?>
</table>
</body>
</html>

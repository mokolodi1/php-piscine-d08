<?php

session_start();

include_once('Arena.class.php');
include_once('Scout.class.php');

# start of 'main' bit


$arena = new Arena();



$scoutA = new Scout(0, 0);
$scoutA->name = "scoutA";
$arena->addShip( $scoutA );


$scoutB = new Scout(0, 0);
$scoutB->name = "scoutB";
$arena->addShip( $scoutB );


// $arena->addShip( new Scout(5, 10) );

print_r($_GET);

function setCurrentPosition(Scout $scout, $x, $y)
{
	$scout->position_x = $x;
	$scout->position_y = $y;
}

// GETTING POSITION OF SHIP A

$_SESSION['xA'] = $_GET['xA'];
$_SESSION['yA'] = $_GET['yA'];
$xA = intval($_SESSION['xA']);
echo $scoutA->position_x;
$yA = intval($_SESSION['yA']);
echo $scoutA->position_y;

// GETTING POSITION OF SHIP B

$_SESSION['xB'] = $_GET['xB'];
$_SESSION['yB'] = $_GET['yB'];
$xB = intval($_SESSION['xB']);
echo $scoutA->position_x;
$yB = intval($_SESSION['yB']);
echo $scoutA->position_y;

// SETTING BOTH POSITIONS


setCurrentPosition($scoutA, $xA, $yA);
setCurrentPosition($scoutB, $xB, $yB);



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
	<p> MOVING SHIP A </p><br/>
	<form action="move<?= $scoutA->name ?>.php" method="post">
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
	
	<p> MOVING SHIP B </p><br/>

	</form>
	<form action="move<?= $scoutB->name ?>.php" method="post">
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


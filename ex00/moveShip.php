<?php
	include_once('Scout.class.php');
	
	session_start();

	function moveShip(Scout $scout){
		if ($_POST['move'] === "moveUp")
		{
			echo $_SESSION['xA'];
		}
		if ($_POST['move'] === "moveLeft")
			echo "MOVE LEFT\n";
		if ($_POST['move'] === "moveRight")
			echo "MOVE RIGHT\n";
		if ($_POST['move'] === "moveDown")
			echo "MOVE DOWN\n";		
	}
	// moveShip();
?>
<?php
	include_once('Scout.class.php');
	
	session_start();

	function moveShip(){
		if ($_POST['move'] === "moveUp")
		{
			$_SESSION['yB']--;
		}
		if ($_POST['move'] === "moveLeft")
		{           
			$_SESSION['xB']--;
		}
		if ($_POST['move'] === "moveRight")
		{           
			$_SESSION['xB']++;
		}
		if ($_POST['move'] === "moveDown")
		{
			$_SESSION['yB']++;
		}
		header('Location: ./index.php?xA='.$_SESSION['xA'].'&yA='.$_SESSION['yA'].'&xB='.$_SESSION['xB'].'&yB='.$_SESSION['yB']);
	}
	moveShip();
?>
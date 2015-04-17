<?php
	include_once('Scout.class.php');
	
	session_start();

	function moveShip(){
		if ($_POST['move'] === "moveUp")
		{
			$_SESSION['yA']--;
		}
		if ($_POST['move'] === "moveLeft")
		{			
			$_SESSION['xA']--;
		}
		if ($_POST['move'] === "moveRight")
		{			
			$_SESSION['xA']++;
		}
		if ($_POST['move'] === "moveDown")
		{			
			$_SESSION['yA']++;
		}
		header('Location: ./index.php?xA='.$_SESSION['xA'].'&yA='.$_SESSION['yA'].'&xB='.$_SESSION['xB'].'&yB='.$_SESSION['yB']);
	}
	moveShip();
?>
<?php

include_once('Arena.class.php');
include_once('Scout.class.php');

@session_start();

function resetGame() {
	$arena = new Arena();

	$arena->addShip( new Scout(0, 0, 'a') );
	$arena->addShip( new Scout($arena->width - 1, $arena->height - 1, 'b') );
    $_SESSION['arena'] = $arena;
    
}

?>
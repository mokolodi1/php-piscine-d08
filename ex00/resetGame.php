<?php

include_once('Arena.class.php');
include_once('Scout.class.php');

@session_start();

function resetGame() {
	$arena = new Arena();

	$arena->addOnScreen( new Scout(0, 0, 'a') );
	$arena->addOnScreen( new Scout($arena->getWidth() - 1, $arena->getHeight() - 1, 'b') );
    $_SESSION['arena'] = $arena;
    
}

?>
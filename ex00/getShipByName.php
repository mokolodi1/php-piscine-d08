<?php

function getShipByName($name, $arena) {
	foreach ( $arena->getOnScreens() as $current ) {
		if ( $name === $current->getName() ) {
			return $current;
		}
	}
	error_log('ship not found in getShipByName');
	return null;
}

?>
<?php

trait Something {
	funciton stuff() {

	}
}

trait SomethingElse {
	function stuff() {

	}
}

class Example {
	use Something, SomethingElse {
		SomethingElse::stuff insteadof Something;
		serializeJson as serialize;
	}
}

try {
	throw new Exception( 'yo', 42 );
	print( 'This will never display.' . PHP_EOL );
} catch (Exception $exception ) {
	print( 'Cool! I caught it!' );
}

?>
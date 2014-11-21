<?php

function soma( $a, $b ) {
	return $a + $b;
}

function swap(& $a, & $b) {
	static $swaps = 0;

	$swaps++;

	$temp = $a;
	$a = $b;
	$b = $temp;

	return $swaps;
}

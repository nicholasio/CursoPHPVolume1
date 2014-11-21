<!DOCTYPE html>
<html>
<head>
	<title>Módulo 5 - Aula 3 - Passagem por referência e passagem por valor</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		
	function modifica( & $a ) {
		$a = 250;
	}

	$a = 10;

	modifica( $a );
	echo $a . '<br />';

	function incr( & $i ) {
		++$i;
	}

	$count = 0;
	incr($count);
	incr($count);
	incr($count);

	echo $count . "<br />";

	$a = 10;
	$b = 15;

	function swap(& $a, & $b) {
		$temp = $a;
		$a = $b;
		$b = $temp;

	}

	swap($a, $b);

	echo "a: {$a} e b: {$b}"  . "<br />";

	?>
</body>
</html>
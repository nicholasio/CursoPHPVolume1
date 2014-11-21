<!DOCTYPE html>
<html>
<head>
	<title>Módulo 5 - Aula 2 - Funções com argumentos e retorno</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		

		function soma($a, $b) {
			return $a + $b;
		}

		echo soma(2,5) . "<br />";

		$foo = 'Escopo Global';

		function HelloFoo( $foo ) {
			echo $foo;
		}

		HelloFoo( 't' );

		$fn = 'HelloFoo';
		$fn( 't' );

	?>
</body>
</html>
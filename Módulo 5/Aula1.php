<!DOCTYPE html>
<html>
<head>
	<title>Módulo 5 - Aula 1 - Funções</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 

	$foo = "Escopo Global";
		
	function helloworld() {
		//$foo = "Escopo Local";

		echo "Olá mundo de uma função <br />";
		global $foo;
		echo $foo;
	}

	echo $foo;
	echo '<br />';
	helloworld();

	$func = 'helloworld';
	$func();


	function saveDataOnFile( $fn = null ) {
		//....
		//....
		if ( ! is_null($fn) ) $fn();
	}

	echo '<br />';
	saveDataOnFile( 'helloworld' );

	?>
</body>
</html>
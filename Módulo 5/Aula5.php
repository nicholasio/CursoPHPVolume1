<!DOCTYPE html>
<html>
<head>
	<title>Módulo 5 - Aula 5 - Funções Anônimas</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 

	$soma = function($a,$b) {
		return $a + b;
	};

	echo $soma(5,4);

	function saveDataOnFile( $fn = null ) {
		//......
		//......

		if ( ! is_null($fn) ) $fn();
	}

	echo '<br />';
	
	saveDataOnFile(
		function() {
			echo "Imprimindo de uma função Anônima";
		}
 	);

	//functions.php
	add_action('init', function() {} );

 	//init.
 	do_action('init');

	?>
</body>
</html>
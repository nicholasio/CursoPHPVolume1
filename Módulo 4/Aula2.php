<html>
<head>
	<title>Módulo 4 - Aula 2</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		$matriz = [ [0,1,2,3,4,5], [3,4,5,6,7,5] ];
		echo $matriz[0][2] . '<br />';
		echo $matriz[1][2];

		echo '<pre>';
			print_r($matriz[0]);
			print_r($matriz[1]);
			print_r($matriz);
		echo '</pre>';

		$pessoas = [
			'nicholas_io' => [ 'name' => 'Nícholas André', 'job' => 'Developer' ], 
			'jonh' => ['name' => 'Jonh', 'job' => 'Designer'],
			'rosi' => ['name' => 'Rosana', 'job' => 'Admnistrator']
		];

		echo '<pre>';
			var_dump($pessoas['nicholas_io']);
		echo '</pre>';

	?>
</body>
</html>
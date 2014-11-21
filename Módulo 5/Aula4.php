<!DOCTYPE html>
<html>
<head>
	<title>Módulo 5 - Aula 4 - Funções com variáveis estáticas e com argumentos variáveis</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		function swap(& $a, & $b) {
			static $swaps = 0;

			$swaps++;

			$temp = $a;
			$a = $b;
			$b = $temp;

			return $swaps;
		}

		$a = 10;
		$b = 25;
		swap($a, $b);
		swap($a, $b);
		$total = swap($a, $b);

		echo "Um total de {$total} swaps foram feitos";

		function sum() {
			$args = func_get_args();
			return array_sum($args);
		}

		echo '<br />';
		echo sum(1,2,3,4) .  ' ' . sum(4,3,234,34,34,34,3,43);



		


	?>
</body>
</html>
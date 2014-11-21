<!DOCTYPE html>
<html>
<head>
	<title>Módulo 6 - Aula 3 - Funções para trabalhar vetores</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		echo '<pre>';
		$array = array(0 => 100, "color" => "red");
		print_r(array_keys($array));
		

		$a = array(1,2,3,4,5);
		$b = array_map(function($a) { return $a*$a*$a; }, $a);

		print_r($b);

		$array1 = array("a" => "green", "red", "blue", "red");
		$array2 = array("b" => "green", "yellow", "red");

		$result = array_diff($array2,$array1);
		print_r($result);
		$fruits = array("img12.png", "img10.png", "img2.png", "img1.png");

		natsort($fruits); //asort, arsort,rsort
		foreach ($fruits as $key => $val) {
		    echo "fruits[" . $key . "] = " . $val . "\n";
		}
		echo '</pre>';


		$array = array('nome' => 'Nícholas', 'profissao' => 'programador');
		extract($array);
		echo $nome ." é um " . $profissao;
		
	?>
</body>
</html>
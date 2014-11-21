<!DOCTYPE html>
<html>
<head>
	<title>Módulo 4 - Aula 1</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		//0..N-1
		$vetor = array(10,223,32423,433,543);

		echo '------ Acessando os índices do vetor -------<br/>';
		echo $vetor[0] . '<br />';
		echo $vetor[1] . '<br />';
		echo $vetor[2] . '<br />';
		echo $vetor[3] . '<br />';
		echo $vetor[4] . '<br />';


		$vetor[5] = 25;
		unset($vetor[5]);

		echo '<pre>';
		print_r($vetor);
		echo '</pre>';

		$anotherVector = array();
		$anotherVector[] = "Valor 1";
		$anotherVector[] = "Valor 2";
		$anotherVector[] = 123123;


		echo '<pre>';
		var_dump($anotherVector);
		echo '</pre>';

		$arr = [0,1,2,3,4];
		var_dump($arr);

		echo '<br />';

		$pessoa = [ 'name' => 'Nícholas André', 'job' => 'Developer'];
		echo $pessoa['name'] . " it's a " . $pessoa['job'] . '<br />';

		$vector = [ 1 => 3, 5 => 8];
		var_dump($vector);

		$mixedArray = [0,1,2, 'key' => 'value'];
		echo '<pre>';
		var_dump($mixedArray);
		echo '</pre>';


	?>
</body>
</html>
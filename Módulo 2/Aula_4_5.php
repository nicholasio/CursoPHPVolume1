<!DOCTYPE html>
<html>
<head>
	<title>Códigos da Aula 4 e 5</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php
		$a = 12;
		$b = 25;

		echo "----Operações Aritméticas Básicas-----";
		echo "<br />";
		echo "Soma :" . ($a + $b) . "<br />";
		echo "Subtração: " . ($a - $b) . "<br />";
		echo "Divisão: " . ($a / $b) . "<br />";
		echo "Multiplicação: " . ($a * $b) . "<br />";	
		echo "Módulo (Resto da divisão inteira): " . ($b % $a) . "<br />";
		echo "Negação: " . (-$a) . "<br />";

		echo "----Notações alternativas-----";
		echo "<br />";
		$a++; //Da mesma forma $a-- decrementa 1
		echo "Novo valor de \$a: " . $a . "<br />";

		//$a vale 13 e $b vale 25
		$c = ++$a + 12 + --$b; //13 + 12 + 24 = 49
		echo "\$c vale: " . $c . "<br />";
		echo "\$a vale: " . $a . "<br />";
		echo "\$b vale: " . $b . "<br />";

		$d = 1;

		echo "Somando \$d com 3 : " . ($d+=3) . "<br />";
		echo "Subtraindo \$d com 3 : " . ($d -=3 ) . "<br />";
		echo "Multiplicando \$d com 25: " . ($d*=25) . "<br />";
		echo "Dividindo \$d com 5: " . ($d/=5) . "<br />";

		echo "----Operadores Bit a Bit-----";
		$a = 5; // 00000101
		$b = 1; // 00000001
		 
		//   00000101
		// & 00000001
		//   --------
		// = 00000001

		$c = $a & $b;
		echo "<br />";
		var_dump($c);

		// "||" tem maior precedência que "or"
		$e  = false || true; // $e will be assigned to (false || true) which is true
		$f 	= (false or true); // $f will be assigned to false
		var_dump($e, $f);


		// "&&" tem maior precedência que "and"
		$g = true && false; // $g will be assigned to (true && false) which is false
		$h = true and false; // $h will be assigned to true
		var_dump($g, $h);

		echo "<br />----Operadores de comparação-----";

		var_dump(3 > 5); //false
		var_dump(4 < 7); // true
		var_dump(3 <=3 ); // true
		var_dump(3 == 2); //false

		$v1 = 3;
		$v2 = '3';
		echo '<br />';
		var_dump($v1 == $v2); //true
		var_dump($v1 === $v2);//false
		


	?>
</body>
</html>

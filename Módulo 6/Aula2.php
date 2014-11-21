<!DOCTYPE html>
<html>
<head>
	<title>Módulo 6 - Aula 2 - Funções para trabalhar com string</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		//Lista de funções http://php.net/manual/en/book.strings.php
		$string = "  este curso de PHP é muito bom  ";

		echo '<pre>';
		$string = trim($string);
		echo $string . "<br />";
		echo "A string possui " . strlen($string) . " caracteres"  . "<br />";
		echo ucfirst($string) . "<br />";
		echo strtoupper($string) . "<br />";
		echo ucfirst(str_replace("PHP", "PHP 5.4", $string)) . "<br />";
		echo $string[strpos($string, 'P')];

		echo '</pre>';
		



	?>
</body>
</html>
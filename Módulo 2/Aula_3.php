<!DOCTYPE html>
<html>
<head>
	<title>Códigos da Aula 3</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		/*
		 * Este é um comentário em bloco!
		 * Utilizado para comentários longos.
		 */
		#Estilo de comentário pouco usado
		//Variável do tipo String
		$title = "Seja bem vindo a aula 3";
		echo "<h1>" . $title . "</h1>";
		var_dump($title);

		echo "<br/>";

		echo '<h1>{$title}s</h1>';

		echo "<br />";
		$integer_var = 12;
		var_dump($integer_var);

		echo "O valor é {$integer_var} <br/ >";

		if ( is_string($integer_var) ) {
			echo "É inteira";
		}

		//Recurso exótico
		$varname = "content";
		$$varname = "Testando variável";

		echo "A variável '" . $varname . "' contém o valor '" . $content . "'"; // ou ${$varname}
	?>

	<br />
	<h1> <?= $title; ?></h1>
</body>
</html>
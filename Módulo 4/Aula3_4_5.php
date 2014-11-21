<!DOCTYPE html>
<html>
<head>
	<title>Módulo 4 -  Aula 3, 4 e 5</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php

		/*
			for ( inicializacao ; condicao; incremento) {
				código a ser repetido
			}
		*/
		echo "Imprimindo números de 0 a 9: ";
		for($i = 0; $i < 10; $i++) {
			echo $i . " ";
		}

		echo "Imprimindo números de 9 a 0: ";
		for( $i = 9; $i >= 0; $i-- ) {
			echo $i . " ";
		}

		$vetor   = [40,32,43,54,34,23,43,54,65];
		$vLength = count($vetor);

		echo '<br />';
		for( $i = 0; $i < $vLength; $i++ ) {
			echo '$vetor[' . $i . '] = ' . $vetor[$i] . '<br />';
		} 
		$notas1 = [10,8, 10];
		$notas2 = [8, 7, 5];
		$notas3 = [5, 6, 4];
		$medias = [];

		for( $i = 0; $i < count($notas1); $i++ ) {
			$medias[$i] = ($notas1[$i] + $notas2[$i] + $notas3[$i]) / 3;
			echo $medias[$i] . '<br />';
		}

		echo '<br />';
		?>

		<h3>Tabuada com For</h3>
		<table border>
			<tr>
				<?php for( $i = 1; $i <= 10; $i++ ) : ?>
					<td colspan="2"><?= $i; ?></td>
				<?php endfor; ?>
			</tr>
			<?php for($i = 1; $i <= 10; $i++ ) {
				echo '<tr>';
					for( $j = 1; $j <= 10; $j++ ) {
						echo "<td width='35px'>" . $j . "*" . $i . " </td>
						 <td witdh='35px'>" . $j * $i . "</td>";
					}
				echo '</tr>';
			}
			?>
		</table>

		<?php

		echo '<br />------------<br />';
		for( $i = 0;$i<15; $i++) {
			if ( $i == 2 || $i == 5 ) continue;
			echo $i . ' ';
			if ( $i == 10 ) break;
		}

		echo '<br />------------<br />';
		$matriz = [
			[ 204,34,23,54,65],
			[ 123, 32,43,54,65],
			[ 123,32,543,123,4]
		];

		echo '<br />------------<br />';
		for( $i = 0; $i < count($matriz); $i++) {
			for($j = 0; $j < count($matriz[$i]); $j++) {
				echo '$matriz[' . $i . '][' . $j . '] = ' . $matriz[$i][$j] . '<br />';
			}
		}

		$vetor_idades  = [  25, 		15, 	46, 	78,		];
		$vetor_pessoas = [ "Nícholas", "Pedro", "João", "Greg", ];

		$N = count($vetor_idades);

		echo "<br />";
		for( $i = 0; $i < $N; $i++ ) {
			echo $vetor_pessoas[$i] . " tem " . $vetor_idades[$i] . " anos <br />";
		}

		$menor_ind = 0;
		for( $i = 1; $i < count($vetor_idades); $i++ ) {
			if( $vetor_idades[$menor_ind] > $vetor_idades[$i] ) {
				$menor_ind = $i;
			}
		}

		echo "<br />";
		echo $vetor_pessoas[$menor_ind] . " é o mais novo";
		echo "<br />";
		foreach( $vetor_idades as $key => $idade ) {
			echo '$vetor_idades['.$key.']=' . $idade . " ";
		}

		//Exercício: Refazer o algoritmo para descobrir o indivíduo mais novo (menor elemento do vetor) com foreach
		echo "<br /><br />";

		/*
		 * O Exercício abaixo pode ser resolvido de diversas maneiras, a resolução abaixo faz uso de algumas funções interessantes
		 * para trabalhar com arrays em PHP (reset e next).
		 */
		$menor 		= reset($vetor_idades); // reset() reseta o ponteiro do array e retorna o primeiro elemento
		$menor_key 	= 0; //O primeiro elemento do array tem indice 0
		next($vetor_idades); //Avança o ponteiro do array para vetor_idades[1] para evitar a primeira comparação que é descenessária

		foreach( $vetor_idades as $key => $idade ) {
			if ( $menor > $idade ) {
				$menor = $idade;
				$menor_key = $key;
			}
		}

		echo "<br />";
		echo $vetor_pessoas[$menor_key] . " é o mais novo";

	?>
</body>
</html>

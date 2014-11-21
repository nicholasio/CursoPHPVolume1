<html>
<head>
	<title>Módulo 4 - Aula 6 - While e Do-While</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		/*
			while ( expr ) {
				
			}
			Enquanto a "expr" for verdadeiro o bloco de código será executado.
		*/
		$i = 0;
		while( $i < 10 ) {
			echo $i . " ";
			$i++;
		}

		$i = 0;
		?>
		<ul>
			<?php while( ++$i <= 10 ) : ?>
				<li><?= $i; ?></li>
			<?php endwhile; ?>
		</ul>
		
		<?php

		echo '<br />----------<br/>';
		$vetor = [ 50, 43,23, 43 , 3, 10];

		$vDesejado = 3;
		$cur = -1;
		while( $vetor[++$cur] != $vDesejado);

		echo 'O elemento ' . $vetor[$cur] . ' está na posição ' . $cur;

		echo '<br />';

		$i = 0;
		do{
			echo 'A condição é falsa e eu estou sendo executado pelo menos uma vez';
		}while($i != 0);

		$cur = -1;
		do { $cur++; } while( $vetor[$cur] != $vDesejado );
		
		echo '<br />';

		echo 'O elemento ' . $vetor[$cur] . ' está na posição ' . $cur;

		$file = new SplFileObject("data.csv");

		while( ! $file->eof() && $line = $file->fgets() ) {
			$data = explode(',', $line);
			echo "Nome: " . $data[0] . " Idade: " . $data[1] . " Profissão: " . $data[2] . "<br />"; 
		}
		

	?>
</body>
</html>
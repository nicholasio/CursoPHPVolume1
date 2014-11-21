<!DOCTYPE html>
<html>
<head>
	<title>Módulo 6 - Aula 4 - Trabalhando com Data e Hora </title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		
		//date_default_timezone_set('America/Fortaleza');

		echo '<pre>';
		$dt = new DateTime( null, new DateTimeZone('America/Fortaleza') );
		echo $dt->format('d/m/Y') . "<br />";

		$dt = new DateTime('2000-01-01', new DateTimeZone('America/Fortaleza') );
		echo $dt->modify('+4 months')->format('d/m/Y') . '<br />';

		$date1 = new DateTime(null, new DateTimeZone('America/Fortaleza'));
		$date2 = new DateTime('+5 months', new DateTimeZone('America/Fortaleza') );

		$diff = $date1->diff($date2);

		print_r($diff);

		echo $diff->m;


		echo '</pre>'

	?>
</body>
</html>
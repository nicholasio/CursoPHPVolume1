<!DOCTYPE html>
<html>
<head>
	<title>Módulo 3 - Aula 1 e 2</title>
	<meta charset="utf-8"/>
</head>
<body>
	<form method="POST" >
		<input type="text" name="nome">
		<input type="submit">
	</form>
	<?php 
		
	$validado = true;
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';

	$validado   = empty($nome) ? false : true; 
	$validado  &= strlen($nome) < 4 ? false : true; 

	if ( $validado ) {
		//mail(....);
		echo 'E-mail foi enviado com sucesso';
	} else {
		echo 'Por Favor, preencha o formulário corretamente';
	}
		

	?>
</body>
</html>
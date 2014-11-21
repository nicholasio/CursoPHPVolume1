<!DOCTYPE html>
<html>
<head>
	<title>Módulo 9 - 1 - Criando Formulários</title>
	<meta charset="utf-8"/>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

	<script>
		$(document).ready(function() {
			$("#contactform").validate({
				rules : {
					'user_name'  :  "required",
					'user_email' : {
						required : true,
						email : true
					}, 
					'msg_subject' : "required",
					'msg_content' : {
						required: true,
						minlength : 3
					}
				},
				messages : {
					'user_name' : "Você precisa digitar seu nome",
					'user_email' : "Por favor, insira um email válido",
					'msg_subject' : "Insira o assunto",
					'msg_content' : "Mensagem muito curta"
				}

			});
		});
	</script>
</head>
<body>

	<form class="cmxform" id="contactform" action="save.php" method="POST">
		<table>
			<tr>
				<td>Seu Nome: </td>
				<td> <input type="text" id="user_name" name="user_name" /> </td>
			</tr>
			<tr>
				<td>E-mail: </td>
				<td> <input type="text" id="user_email" name="user_email" /></td>
			</tr>
			<tr>
				<td>Assunto: </td>
				<td> <input type="text" id="msg_subject" name="msg_subject" /></td>
			</tr>
			<tr>
				<td>Mensagem: </td>
				<td> <textarea id="msg_content" name="msg_content" ></textarea></td>
			</tr>
			<tr>
				<td colspan="2"> <input type="submit" name="msg_submited" value="Enviar" /> </td>
			</tr>
		</table>
	</form>
	<h2>Registros Salvos</h2>
	<?php 
		include('conn.php');

		$select = $conn->prepare('SELECT * FROM RegistrosForm');
		if ( $select->execute() ) {
			$results = $select->fetchAll(PDO::FETCH_OBJ);
			echo '<table border="1">';
			echo '<tr>';
			echo '<th>Nome</th>';
			echo '<th>Email</th>';
			echo '<th>Assunto</th>';
			echo '<th>Mensagem</th>';
			echo '</tr>';
			foreach($results as $result) : 
			?>
				<tr>
					<td><?= $result->Name; ?></td>
					<td><?= $result->Email; ?></td>
					<td><?= $result->Assunto; ?></td>
					<td><?= $result->Mensagem; ?></td>
				</tr>
			<?php
			endforeach;

			echo '</table>';
		}
	?>
</body>
</html>
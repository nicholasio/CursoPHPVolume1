<!DOCTYPE html>
<html>
<head>
	<title>Módulo 8 - Aula 2 e 3 - Manipulando o Banco com PDO</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
		include ( 'conn.php' ); 

		$qr 	= $conn->query("SELECT * FROM Users");
		$result = $qr->fetchAll(PDO::FETCH_OBJ);

		echo '<pre>';
		var_dump($result);
		echo '</pre>';

		foreach( $result as $row ) {
			echo $row->Biografia;
		}

		$email = isset($_GET['email']) ? $_GET['email'] : '';

		$stmt  = $conn->prepare("SELECT * FROM Users WHERE Email = :email ");
		$stmt->BindValue(':email', $email);

		if ( $stmt->execute() ) {
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);

			var_dump($result);
		}

		$insert = $conn->prepare("INSERT INTO Users (Nome,Biografia, Login, Senha, Email) 
								  VALUES (:nome, :biografia, :login, :senha, :email) ");
		$insert->execute(
			array(	':nome' => 'Jonh2', 
					':biografia' => 'Longa biografia',
			 		':login' => 'jonh', 
			 		':senha' => sha1('1231'), 
			 		':email' =>'jongh@email.com'
			) 
		);

		$id = 3;
		$biografia = 'Minha longa biografia';
		$update = $conn->prepare("UPDATE Users SET Biografia = :biografia WHERE idUsers = :idUsers ");
		$update->BindValue(':biografia', $biografia, PDO::PARAM_STR);
		$update->BindValue(':idUsers', $id, PDO::PARAM_INT);

		if ( $update->execute() ) {
			echo 'Alterado com sucesso' . '<br />';
		}

		$delete = $conn->prepare("DELETE FROM Users WHERE idUsers = :idUsers");
		$delete->execute( array( ':idUsers' => 3) );

	?>
</body>
</html>
<?php
session_start(); 

include ( 'conn.php' );

$login = '';
$senha = '';
if ( isset($_SESSION['user_data']) && is_array($_SESSION['user_data']) ) {
	$user_data = $_SESSION['user_data'];
	$login = $user_data['user_login'];
	$senha = $user_data['user_pass'];  
}

if ( ! empty($login) && ! empty($senha) ) {
	$access = $conn->prepare("SELECT * FROM Users WHERE Login = :login AND Senha = :senha");
	$access->BindValue(':login', $login);
	$access->BindValue(':senha', $senha);

	if ( $access->execute() ) {
		$result = $access->fetch(PDO::FETCH_OBJ);
		if ( ! $result ) {
			unset($_SESSION['user_data']);
			//echo "Erro 1";
			header("Location: login.php");
		}
	}
} else {
	//echo "Erro 2";
	header("Location: login.php");
}
<?php

include ( 'conn.php' );

$login = '';
$senha = '';
if ( isset($_COOKIE['user_login']) ) $login = $_COOKIE['user_login'];
if ( isset($_COOKIE['user_pass']) ) $senha = $_COOKIE['user_pass'];

if ( ! empty($login) && ! empty($senha) ) {
	$access = $conn->prepare("SELECT * FROM Users WHERE Login = :login AND Senha = :senha");
	$access->BindValue(':login', $login);
	$access->BindValue(':senha', $senha);

	if ( $access->execute() ) {
		$result = $access->fetch(PDO::FETCH_OBJ);
		if ( ! $result ) {
			setcookie('user_login');
			setcookie('user_pass');
			header("Location: login.php");
		}
	}
} else {
	header("Location: login.php");
}
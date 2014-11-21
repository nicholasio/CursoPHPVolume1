<?php
session_start();

include ('conn.php');

$login = $_POST['user_login'];
$senha = $_POST['user_pass'];

$access = $conn->prepare("SELECT * FROM Users WHERE Login = :login AND Senha = :senha"); 
$access->BindValue(':login', $login);
$access->BindValue(':senha', sha1($senha));

if ( $access->execute() ) {
	$result = $access->fetch(PDO::FETCH_OBJ);
	if ( $result ) {
		$user_session = ['user_login' => $login, 'user_pass' => sha1($senha) ];
		$_SESSION['user_data'] = $user_session;

		header("Location: home_session.php");
	}
}
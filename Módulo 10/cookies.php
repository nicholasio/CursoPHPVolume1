<?php

include ('conn.php');

$login = $_POST['user_login'];
$senha = $_POST['user_pass'];

$access = $conn->prepare("SELECT * FROM Users WHERE Login = :login AND Senha = :senha"); 
$access->BindValue(':login', $login);
$access->BindValue(':senha', sha1($senha));

if ( $access->execute() ) {
	$result = $access->fetch(PDO::FETCH_OBJ);
	if ( $result ) {
		setcookie('user_login', $login, time() + 3600);
		setcookie('user_pass', sha1($senha), time() + 3600);

		header("Location: home_cookies.php");
	}
}
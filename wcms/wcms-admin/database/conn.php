<?php
include ( WCMS_ADMIN_DIR . '/database/config.php');

try{
	$conn = new PDO(
    	'mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS
	);	
} catch (PDOException $e) {
	echo "Erro: " . $e->getMessage() . "<br />";
	die();
}

function getConnection() {
	global $conn;

	return $conn;
}
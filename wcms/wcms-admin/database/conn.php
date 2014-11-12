<?php
define('DBNAME', 'wcms' );
define('DBUSER', 'root' );
define('DBPASS', 'root' );

try{
	$conn = new PDO(
    	'mysql:host=localhost;dbname=' . DBNAME, DBUSER, DBPASS
	);	
} catch (PDOException $e) {
	echo "Erro: " . $e->getMessage() . "<br />";
	die();
}

function getConnection() {
	global $conn;

	return $conn;
}



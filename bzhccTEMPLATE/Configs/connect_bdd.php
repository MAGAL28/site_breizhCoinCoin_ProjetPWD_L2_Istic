<?php

$server = "localhost";
$username = "root";
$password = "root";
$dbname = "BreizhCoinCoin";
 
try {
	$conn = new PDO(
		"mysql:host=$server;dbname=$dbname",
		"$username","$password"
	);
}
catch(PDOException $e) {
	die('Unable to connect with the database');
}

?>

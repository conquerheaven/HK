<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=haoke', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
<<<<<<< HEAD
	$pdo->exec('SET NAMES "utf8"');
=======
	$pdo->exec('SET NAMES "gbk"');
>>>>>>> e062470de3f54e2394241421aad1042a54fe4bcb
}
catch (PDOException $e){
	$output = 'Uable to connect to the database server: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
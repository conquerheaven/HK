<?php
include 'db.inc.php';


try {
	$sql = 'SELECT ID,Name FROM scxingzhi';
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'Êý¾Ý¿â´íÎó£¡';
	include 'error.php';
	exit();
}
while($row = $s->fetch()){
	$scxingzhiID[] = $row['ID'];
	$scxingzhiName[] = $row['Name'];
}
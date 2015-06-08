<?php
include 'db.inc.php';


try {
	$sql = 'SELECT * FROM tihuoyx';
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
while($row = $s->fetch()){
	$tihuoyxID[] = $row['ID'];
	$tihuoyxName[] = $row['Name'];
}
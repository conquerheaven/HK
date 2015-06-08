<?php
include 'db.inc.php';


try {
	$sql = 'SELECT ID,name,telephone FROM kehulist order by name';
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
while($row = $s->fetch()){
	$kehuid[] = $row['ID'];
	$kehuname[] = $row['name'];
	$kehutelephone[] = $row['telephone'];
}
<?php
include 'db.inc.php';


try {
	$sql = 'SELECT code,name FROM province';
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
while($row = $s->fetch()){
	$provinceID[] = $row['code'];
	$provinceName[] = $row['name'];
}
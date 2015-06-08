<?php
include 'db.inc.php';


try {
	$sql = 'SELECT distinct scname FROM kehulist order by scname';
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
while($row = $s->fetch()){
	$scname[] = $row['scname'];
}
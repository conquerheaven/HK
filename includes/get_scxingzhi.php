<?php
include 'db.inc.php';


try {
	$sql = 'SELECT ID,Name FROM scxingzhi';
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
while($row = $s->fetch()){
	$scxingzhiID[] = $row['ID'];
	$scxingzhiName[] = $row['Name'];
}
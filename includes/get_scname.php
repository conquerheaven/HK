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
$arr=array();
$arr[] = array('dataID'=>'' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['scname'] , 'dataValue'=>$row['scname']);
}
echo json_encode($arr);
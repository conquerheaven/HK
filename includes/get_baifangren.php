<?php
include 'db.inc.php';


try {
	$sql = 'SELECT name FROM ygdangan where bmname="YW" or bmname="06" order by name';
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'' , 'dataValue'=>'无');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['name'] , 'dataValue'=>$row['name']);
}
echo json_encode($arr);
<?php
include 'db.inc.php';

$provinceID = $_GET['provinceID'];

try {
	$sql = 'SELECT ID,sheng FROM kehuadd where preid = '.$provinceID;
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'-1' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['ID'] , 'dataValue'=>$row['sheng']);
}
echo json_encode($arr);
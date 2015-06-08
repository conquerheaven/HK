<?php
include 'db.inc.php';

$provinceID = $_GET['provinceID'];

try {
	$sql = 'SELECT code,name FROM city where provincecode = :provincecode';
	$s = $pdo->prepare($sql);
	$s->bindValue(':provincecode',$provinceID);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'0' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['code'] , 'dataValue'=>$row['name']);
}
echo json_encode($arr);
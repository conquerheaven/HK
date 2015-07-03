<?php
include 'db.inc.php';


try {
	$sql = 'SELECT ID,name FROM tuoyunbu where name <> "" order by name';
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'0' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['ID'] , 'dataValue'=>$row['name']);
}
echo json_encode($arr);
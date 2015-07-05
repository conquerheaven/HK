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
$arr=array();
$arr[] = array('dataID'=>'0' , 'dataValue1'=>'全部' , 'dataValue2'=>'');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['ID'] , 'dataValue1'=>$row['name'] , 'dataValue2'=>$row['telephone']);
}
echo json_encode($arr);
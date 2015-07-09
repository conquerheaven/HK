<?php
include 'db.inc.php';

try {
	$sql= 'SELECT * FROM productclass where classname is not null and classname <> ""';
	$s = $pdo->query($sql);
} catch (PDOException $e){
	$output = 'Error fetching class: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'0' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['ID'] , 'dataValue'=>$row['classname']);
}
echo json_encode($arr);
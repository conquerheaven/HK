<?php
include 'db.inc.php';

try {
	$sql = 'SELECT distinct pingpai FROM  kehulist WHERE pingpai <>  "" ORDER BY pingpai';
	$s = $pdo->query($sql);
} catch (PDOException $e) {
	$output = 'Error fetching pinpai: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'all' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['pingpai'] , 'dataValue'=>$row['pingpai']);
}
echo json_encode($arr);
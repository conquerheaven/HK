<?php
include 'db.inc.php';

try {
	$sql= 'SELECT * FROM yanse';
	$s = $pdo->query($sql);
} catch (PDOException $e){
	$output = 'Error fetching yanse: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'0' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['ID'] , 'dataValue'=>$row['name']);
}
echo json_encode($arr);
<?php
include 'db.inc.php';

try {
	$sql = 'SELECT distinct fhr FROM ddmessage';
	$s = $pdo->query($sql);
} catch (PDOException $e) {
	$output = 'Error fetching fahuoren: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'all' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['fhr'] , 'dataValue'=>$row['fhr']);
}
echo json_encode($arr);
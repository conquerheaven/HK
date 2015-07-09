<?php
include 'db.inc.php';

try {
	$sql = 'SELECT distinct fuzheren FROM kehulist';
	$s = $pdo->query($sql);
} catch (PDOException $e) {
	$output = 'Error fetching kehufuzeren: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'all' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['fuzheren'] , 'dataValue'=>$row['fuzheren']);
}
echo json_encode($arr);
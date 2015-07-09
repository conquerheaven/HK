<?php
include 'db.inc.php';

try {
	$sql = 'SELECT distinct chaozuoren FROM ddmessage ORDER BY chaozuoren';
	$s = $pdo->query($sql);
} catch (PDOException $e) {
	$output = 'Error fetching kaidanren: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
$arr=array();
$arr[] = array('dataID'=>'all' , 'dataValue'=>'全部');
while($row = $s->fetch()){
	$arr[] = array('dataID'=>$row['chaozuoren'] , 'dataValue'=>$row['chaozuoren']);
}
echo json_encode($arr);
<?php
include 'db.inc.php';

$tybname = $_GET['tybname'];
$tybtelephone = $_GET['tybtelephone'];
$tybaddress = $_GET['tybaddress'];
$tybitem = $_GET['tybitem'];

try{
	$sql = 'insert into tuoyunbu(name , address , telephone , item) values (:name , :address , :telephone , :item)';
	$s = $pdo->prepare($sql);
	$s->bindValue(':name',$tybname);
	$s->bindValue(':address',$tybaddress);
	$s->bindValue(':telephone',$tybtelephone);
	$s->bindValue(':item',$tybitem);
	$s->execute();
	echo json_encode(array('result' => '1'));
}catch (PDOException $e){
	echo json_encode(array('result' => '0'));
}
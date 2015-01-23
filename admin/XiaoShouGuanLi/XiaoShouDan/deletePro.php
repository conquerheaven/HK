<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/db.inc.php';

$id = $_GET['id'];
session_start();
if($id == -1){
	unset($_SESSION['id']);
	unset($_SESSION['price']);
	unset($_SESSION['num']);
	unset($_SESSION['beizhu']);
}else{
	array_splice($_SESSION['id'], $id , 1);
	array_splice($_SESSION['price'], $id , 1);
	array_splice($_SESSION['num'], $id , 1);
	array_splice($_SESSION['beizhu'], $id , 1);
}

include 'showOrder.php';

?>
</body>
</html>
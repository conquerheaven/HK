<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/db.inc.php';

$id = $_GET['id'];
$price = $_GET['price'];
$num = $_GET['num'];
$beizhu = $_GET['beizhu'];
session_start();

$_SESSION['price'][$id] = $price;
$_SESSION['num'][$id] = $num;
$_SESSION['beizhu'][$id] = $beizhu;

include 'showOrder.php';

?>
</body>
</html>
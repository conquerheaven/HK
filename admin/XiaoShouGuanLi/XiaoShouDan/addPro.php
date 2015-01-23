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
session_start();
$_SESSION['id'][] = $id;
$_SESSION['price'][] = $price;
$_SESSION['num'][] = 1;
$_SESSION['beizhu'][] = "";

include 'showOrder.php';

?>
</body>
</html>
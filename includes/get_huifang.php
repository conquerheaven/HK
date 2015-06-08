<?php
include 'db.inc.php';

$kehutype = $_GET['kehutype'];
$starttime = $_GET['starttime'];
$endtime = $_GET['endtime'];
$provincecode =	$_GET['provincecode'];
$citycode =	$_GET['citycode'];
$areacode =	$_GET['areacode'];
$kehuid = $_GET['kehuid'];
$scname	= $_GET['scname'];
$scxingzhi = $_GET['scxingzhi'];
$tihuoyx = $_GET['tihuoyx'];

try {
	$sql = 'SELECT ID,name,addtime,sheng,city,xian,scname,scxingzhi,pingpai,fuzheren,lastjytime,lasthftime,dzname,zxdangci,khtuiguang,tihuoyx,pingpai2,khlaiyuan,baifangren FROM kehulist WHERE ID <> 0';
	if($kehutype == 1) $sql .= 'AND lastjytime <> "0000-00-00"';
	if($kehutype == 2) $sql .= 'AND lastjytime = "0000-00-00"';
	if($kehuid != 0) $sql .= 'AND ID = '.$kehuid;
	if($scname != "0") $sql .= 'AND scname = "'.$scname.'"';
	if($scxingzhi != 0) $sql .= 'AND scxingzhi = '.$scxingzhi;
	if($tihuoyx != 0) $sql .= 'AND tihuoyx = '.$tihuoyx;
	if($starttime != "" && $endtime != ""){
		$sql .= 'AND ID in(select kehuid FROM ddmessage WHERE xiadangtime between '.$starttime.' and '.$endtime.')';
	}
	if($provincecode != 0){
		$sql .= 'AND sheng in(select id from province where code = '.$provincecode.')';
	}
	if($citycode != 0){
		$sql .= 'AND shi in(select id from city where code = '.$citycode.')';
	}
	if($areacode != 0){
		$sql .= 'AND shi in(select id from area where code = '.$areacode.')';
	}
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}
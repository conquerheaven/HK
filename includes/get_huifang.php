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

$addtime;
$firstjytime;
$nojyday;
$jytimes;
$province;
$city;
$area;
$scname;
$scmianji;
$scxingzhi;
$yearsaleval;
$pinpai;
$kehuname;
$fuzeren;
$totalsale;
$lastthtime;
$lasthftime;
$dianyuannum;
$dzname;
$chuyangnum;
$zxdangci;
$tgyishi;
$tihuoyx;
$competepinpai;
$jsxingzhi;
$khlaiyuan;
$baifangren;

function get_provinceName($id){
	$sql = 'SELECT name from province where id = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "无";
}

function get_cityName($id){
	$sql = 'SELECT name from city where id = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "无";
}

function get_areaName($id){
	$sql = 'SELECT name from area where id = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "无";
}

function get_scxingzhi($id){
	$sql = 'SELECT Name from scxingzhi where ID = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "无";
}

function get_zxdangci($id){
	$sql = 'SELECT Name from zxdangci where ID = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "无";
}

function get_khtuiguang($id){
	$sql = 'SELECT Name from khtuiguang where ID = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "无";
}

function get_tihuoyx($id){
	$sql = 'SELECT Name from tihuoyx where ID = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "无";
}

function get_khlaiyuan($id){
	$sql = 'SELECT Name from khlaiyuan where ID = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "无";
}

function get_firstjytime($id){
	$sql = 'SELECT xiadangtime from ddmessage where kehuid = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	if($row = $s->fetch()) return $row[0];
	else return " ";
}

function get_nojyday($lastjytime){
	$nowtime = date("y-m-d",time());
	$oldtime = strtotime($lastjytime);
	$cle = $tow - $one;
	return floor($cle/3600/24);
}

function get_jytimes($id){
	$sql = 'SELECT COUNT(ID) from ddmessage where kehuid = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "0";
}

function get_totalsale($id){
	$sql = 'SELECT SUM(sums) from ddmessage where kehuid = '.$id;
	$s = $GLOBALS['pdo']->prepare($sql);
	$s->execute();
	$row = $s->fetch();
	if($row = $s->fetch()) return $row[0];
	else return "0";
}

try {
	$sql = 'SELECT ID,name,addtime,sheng,city,xian,scname,scmianji,scxingzhi,pingpai,fuzheren,lastjytime,lasthftime,dzname,zxdangci,khtuiguang,tihuoyx,pingpai2,khlaiyuan,baifangren FROM kehulist WHERE ID <> 0';
	if($kehutype == 1) $sql .= 'AND lastjytime <> "0000-00-00"';
	if($kehutype == 2) $sql .= 'AND lastjytime = "0000-00-00"';
	if($kehuid != 0) $sql .= 'AND ID = '.$kehuid;
	if($scname != "0") $sql .= 'AND scname = "'.$scname.'"';
	if($scxingzhi != 0) $sql .= 'AND scxingzhi = '.$scxingzhi;
	if($tihuoyx != 0) $sql .= 'AND tihuoyx = '.$tihuoyx;
	if($starttime != "" && $endtime != "") $sql .= 'AND ID in(select kehuid FROM ddmessage WHERE xiadangtime between '.$starttime.' and '.$endtime.')';
	if($provincecode != 0) $sql .= 'AND sheng in(select id from province where code = '.$provincecode.')';
	if($citycode != 0) $sql .= 'AND shi in(select id from city where code = '.$citycode.')';
	if($areacode != 0) $sql .= 'AND xian in(select id from area where code = '.$areacode.')';
	$s = $pdo->prepare($sql);
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
	exit();
}

$arr = array();
$count = 1;
while($row = $s->fetch()){
	$addtime = $row['addtime'];
	$firstjytime = get_firstjytime($row['ID']);
	/*$nojyday = get_nojyday($row['lastjytime']);
	$jytimes = get_jytimes($row['ID']);
	$province = get_provinceName($row['sheng']);
	$city = get_cityName($row['city']);
	$area = get_areaName($row['xian']);
	$scname = $row['scname'];
	$scmianji = $row['scmianji'];
	$scxingzhi = get_scxingzhi($row['scxingzhi']);
	$yearsaleval = "???";
	$pinpai = $row['pingpai'];
	$kehuname = $row['name'];
	$fuzeren = $row['fuzheren'];
	$totalsale = get_totalsale($row['ID']);
	$lastthtime = $row['lastjytime'];
	$lasthftime = $row['lasthftime'];
	$dianyuannum = "??";
	$dzname = $row['dzname'];
	$chuyangnum = "??";
	$zxdangci = get_zxdangci($row['zxdangci']);
	$tgyishi = get_khtuiguang($row['khtuiguang']);
	$tihuoyx = get_tihuoyx($row['tihuoyx']);
	$competepinpai = $row['pingpai2'];
	$jsxingzhi = "??";
	$khlaiyuan = get_khlaiyuan($row['khlaiyuan']);
	$baifangren = $row['baifangren'];
	$arr[] = array(
			'xuhao'=>$count,
			'addtime'=>$addtime,
			'firstjytime'=>$firstjytime,
			'nojyday'=>$nojyday,
			'jytimes'=>$jytimes,
			'province'=>$province,
			'city'=>$city,
			'area'=>$area,
			'scname'=>$scname,
			'scmianji'=>$scmianji,
			'scxingzhi'=>$scxingzhi,
			'yearsaleval'=>$yearsaleval,
			'pinpai'=>$pinpai,
			'kehuname'=>$kehuname,
			'fuzeren'=>$fuzeren,
			'totalsale'=>$totalsale,
			'lastthtime'=>$lastthtime,
			'lasthftime'=>$lasthftime,
			'dianyuannum'=>$dianyuannum,
			'dzname'=>$dzname,
			'chuyangnum'=>$chuyangnum,
			'zxdangci'=>$zxdangci,
			'tgyishi'=>$tgyishi,
			'tihuoyx'=>$tihuoyx,
			'competepinpai'=>$competepinpai,
			'jsxingzhi'=>$jsxingzhi,
			'khlaiyuan'=>$khlaiyuan,
			'baifangren'=>$baifangren
	);
	$count++;*/
}
//echo json_encode($arr);


$arr[] = array(
		'xuhao'=>'1',
		'addtime'=>'???',
		'firstjytime'=>'???',
		'nojyday'=>'???',
		'jytimes'=>'???',
		'province'=>'???',
		'city'=>'???',
		'area'=>'???',
		'scname'=>'???',
		'scmianji'=>'???',
		'scxingzhi'=>'???',
		'yearsaleval'=>'???',
		'pinpai'=>'???',
		'kehuname'=>'???',
		'fuzeren'=>'???',
		'totalsale'=>'???',
		'lastthtime'=>'???',
		'lasthftime'=>'???',
		'dianyuannum'=>'???',
		'dzname'=>'???',
		'chuyangnum'=>'???',
		'zxdangci'=>'???',
		'tgyishi'=>'???',
		'tihuoyx'=>'???',
		'competepinpai'=>'???',
		'jsxingzhi'=>'???',
		'khlaiyuan'=>'???',
		'baifangren'=>'???'
);
echo json_encode($arr);
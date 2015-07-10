<?php
include 'db.inc.php';
function microtime_float()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}
$starttime = microtime_float();
$start = $_GET['start'];
$end = $_GET['end'];
$class = $_GET['leixing'];
$xinghao = $_GET['xinghao'];
$yanse = $_GET['yanse'];
$area = $_GET['area'];
$province = $_GET['province'];
$city = $_GET['city'];
$xian = $_GET['xian'];
$status = $_GET['status'];
$proname = $_GET['proname'];
$pinpai = $_GET['pinpai'];
$kehufuzeren = $_GET['fuzeren'];
$kaidanren = $_GET['kaidanren'];
$jiajucheng = $_GET['jiajucheng'];
$kehu = $_GET['kehu'];
$fahuoren = $_GET['fahuoren'];
$tuoyunbu = $_GET['tuoyunbu'];
$tuoyunname;
$name = '无';
$caizhi;
$id;
$sum;
$price;
$num;
$time;
$kehuid;
$kehuname;
$addr_sheng;
$addr_shi;
$addr_xian;
$danhao = $_GET['danhao'];
$tuoyunhao = $_GET['tuoyunhao'];
$shoukuanfs = $_GET['shoukuanfs'];
$shoukuanqk;
$fuzeren;
$color;
$leixing;
$style;
$shoukuanri;
$fhr;
$telephone;
$address;
$idList = '';
$Finish = 0;
$Unfinish = 0;
$Final_num = 0;

$arr=array();

function table_productclass(){
	try {
		$sql = 'SELECT classname FROM productclass WHERE ID="'.$GLOBALS['leixing'].'"';
		$result = $GLOBALS['pdo']->query($sql);
		if($row = $result->fetch()){
			$GLOBALS['leixing'] = $row['classname'];
		}
	} catch (PDOException $e) {
		$output = 'Error query productclass: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}
function table_yanse(){
	try {
		$sql = 'SELECT name FROM yanse WHERE ID="'.$GLOBALS['color'].'"';
		$result = $GLOBALS['pdo']->query($sql);
		if($row = $result->fetch()){
			$GLOBALS['color'] = $row['name'];
		}
	} catch (PDOException $e) {
		$output = 'Error query yanse: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}
function table_caizhi(){
	try {
		$sql = 'SELECT name FROM caizhi WHERE ID="'.$GLOBALS['caizhi'].'"';
		$result = $GLOBALS['pdo']->query($sql);
		if($row = $result->fetch()){
			$GLOBALS['caizhi'] = $row['name'];
		}
	} catch (PDOException $e) {
		$output = 'Error query caizhi: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}
function table_kehuadd($ID){
	try {
		$sql = 'SELECT sheng FROM kehuadd WHERE ID="'.$ID.'"';
		$res = $GLOBALS['pdo']->query($sql);
		if($row = $res->fetch()){
			return $row['sheng'];
		}
		return '';
	} catch (PDOException $e) {
		$output = 'Error query province: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}
function table_kehulist(){
	try {
		$sql = 'SELECT name,telephone,address,dqid,sheng,city,xian,tybid,pingpai,fuzheren FROM kehulist WHERE ID="'.$GLOBALS['kehuid'].'" AND name LIKE "%'.$GLOBALS['kehu'].'%" AND scname LIKE "%'.$GLOBALS['jiajucheng'].'%"';
		//echo '#'.$GLOBALS['fuzeren'];
		$res = $GLOBALS['pdo']->query($sql);
		if($row = $res->fetch()){
			if($GLOBALS['area'] != -1 && $GLOBALS['area'] != $row['dqid']) return false;
			if($GLOBALS['province'] != -1 && $GLOBALS['province'] != $row['sheng']) return false;
			if($GLOBALS['city'] != -1 && $GLOBALS['city'] != $row['city']) return false;
			if($GLOBALS['xian'] != -1 && $GLOBALS['xian'] != $row['xian']) return false;
			if($GLOBALS['pinpai'] != 'all' && $GLOBALS['pinpai'] != $row['pingpai']) return false;
			if($GLOBALS['kehufuzeren'] != 'all' && $GLOBALS['kehufuzeren'] != $row['fuzheren']) return false;
			if($GLOBALS['tuoyunbu'] !=0 && $GLOBALS['tuoyunbu'] != $row['tybid']) return false;
			$GLOBALS['tuoyunname'] = $row['tybid'];
			$GLOBALS['kehuname'] = $row['name'];
			$GLOBALS['addr_sheng'] = table_kehuadd($row['sheng']);
			$GLOBALS['addr_shi'] = table_kehuadd($row['city']);
			$GLOBALS['addr_xian'] = table_kehuadd($row['xian']);
			$GLOBALS['fuzeren'] = $row['fuzheren'];
			$GLOBALS['telephone'] = $row['telephone'];
			$GLOBALS['address'] = $row['address'];
			return true;
		}
		return false;
		//echo $kehuname.$address.'#';
	} catch (PDOException $e) {
		$output = 'Error query kehulist: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}
function table_jiaoyistats(){
	try {
		$sql = 'SELECT name FROM jiaoyistats WHERE ID="'.$GLOBALS['shoukuanqk'].'"';
		$res = $GLOBALS['pdo']->query($sql);
		if($row = $res->fetch()){
			$GLOBALS['shoukuanqk'] = $row['name'];
		}
	} catch (PDOException $e) {
		$output = 'Error query jiaoyistats: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}
function table_tuoyunbu(){
	try {
		$sql = 'SELECT name FROM tuoyunbu WHERE ID="'.$GLOBALS['tuoyunname'].'"';
		$res = $GLOBALS['pdo']->query($sql);
		if($row = $res->fetch()){
			$GLOBALS['tuoyunname'] = $row['name'];
		}else{
			$GLOBALS['tuoyunname'] = '';
		}
	} catch (PDOException $e) {
		$output = 'Error query tuoyunbu: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}
function table_products($id){
	try {
		$sql = 'SELECT ID,name,caizhi,idname,classid,yanshe FROM products WHERE ID='.$id.'';
		$result = $GLOBALS['pdo']->query($sql);
		if($row = $result->fetch()){
			$GLOBALS['style'] = $row['idname'];
			$GLOBALS['leixing'] = $row['classid'];
			$GLOBALS['color'] = $row['yanshe'];
			$GLOBALS['id'] = $row['ID'];
			$GLOBALS['name'] = $row['name'];
			$GLOBALS['caizhi'] = $row['caizhi'];
		}
	} catch (PDOException $e) {
		$output = 'Error query products: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}

function show(&$arr){
	$temparr=array();
	if($GLOBALS['shoukuanqk']=='0') $GLOBALS['shoukuanqk'] = '下单未发货';
	if($GLOBALS['shoukuanqk']=='已结算') $css = 'black';//$temparr = array('css'=>'#CCFF00');
	else if($GLOBALS['shoukuanqk']=='下单未发货') $css = 'green';//$temparr = array('css'=>'#FEFF80');
	else $css = 'red';//$temparr = array('css'=>'#FE9980');
	$temparr = array('css'=>$css,
			'danhao'=>$GLOBALS['danhao'],
			'time'=>$GLOBALS['time'],
			'leixing'=>$GLOBALS['leixing'],
			'name'=>$GLOBALS['name'],
			'style'=>$GLOBALS['style'],
			'caizhi'=>$GLOBALS['caizhi'],
			'color'=>$GLOBALS['color'],
			'num'=>$GLOBALS['num'],
			'price'=>$GLOBALS['price'],
			'sum'=>$GLOBALS['sum'],
			'shoukuanqk'=>$GLOBALS['shoukuanqk'],
			'shoukuanfs'=>$GLOBALS['shoukuanfs'],
			'tuoyunhao'=>$GLOBALS['tuoyunhao'],
			'tuoyunbu'=>$GLOBALS['tuoyunname'],
			'fhr'=>$GLOBALS['fhr'],
			'addr_sheng'=>$GLOBALS['addr_sheng'],
			'addr_shi'=>$GLOBALS['addr_shi'],
			'addr_xian'=>$GLOBALS['addr_xian'],
			'kehuname'=>$GLOBALS['kehuname'],
			'telephone'=>$GLOBALS['telephone'],
			'address'=>$GLOBALS['address'],
			'fuzeren'=>$GLOBALS['fuzeren'],
			'kaidanren'=>$GLOBALS['kaidanren'],
			'shoukuanri'=>$GLOBALS['shoukuanri']
			);
	$arr[] = $temparr;
	if($GLOBALS['shoukuanqk'] == '已结算') $GLOBALS['Finish'] += $GLOBALS['sum'];
	else $GLOBALS['Unfinish'] += $GLOBALS['sum'];
	$GLOBALS['Final_num'] += $GLOBALS['num'];
}
function table_ddmessage(&$arr){
	try {
		$sql = 'SELECT piaohao,tuoyunhao,kehuid,xiadangtime,shoukuanfs,stats,chaozuoren,productsid,shoukuanri,fhr FROM ddmessage WHERE stats <> 6 and xiadangtime BETWEEN "'.$GLOBALS['start'].'" and "'.$GLOBALS['end'].'"';
		$sql .= ' AND tuoyunhao LIKE "%'.$GLOBALS['tuoyunhao'].'%" AND piaohao LIKE "%'.$GLOBALS['danhao'].'%"';
		if($GLOBALS['shoukuanfs'] != 'all') $sql .= ' AND shoukuanfs LIKE "%'.$GLOBALS['shoukuanfs'].'%"';
		if($GLOBALS['status'] != 'all') $sql .= ' AND stats='.$GLOBALS['status'].'';
		if($GLOBALS['kaidanren'] != 'all') $sql .= ' AND chaozuoren="'.$GLOBALS['kaidanren'].'"';
		if($GLOBALS['fahuoren'] != 'all') $sql .= 'AND fhr = "'.$GLOBALS['fahuoren'].'"';
		$sql .= ' ORDER BY xiadangtime';
		$result = $GLOBALS['pdo']->query($sql);
		$ary=array('1','2','3','4','5','6','7','8','9','0');
		while($row = $result->fetch()){
			$GLOBALS['kehuid'] = $row['kehuid'];
			if(!table_kehulist()) continue;
			$GLOBALS['tuoyunhao'] = $row['tuoyunhao'];
			$GLOBALS['shoukuanqk'] = $row['stats'];
			table_jiaoyistats();
			table_tuoyunbu();
			$GLOBALS['shoukuanri'] = $row['shoukuanri'];
			$GLOBALS['danhao'] = $row['piaohao'];
			$GLOBALS['time'] = $row['xiadangtime'];
			$GLOBALS['shoukuanfs'] = $row['shoukuanfs'];
			$GLOBALS['fhr'] = $row['fhr'];
			$GLOBALS['kaidanren'] = $row['chaozuoren'];
			$products = $row['productsid'];
			$temp = '';
			unset($nums);
			for($i=0; $i<strlen($products); $i++){
				if(in_array($products[$i], $ary)){
					$temp .= $products[$i];
				}else{
					if($temp != '')$nums[] = $temp;
					//echo $temp.'#';
					$temp = '';
				}
			}
			if($temp != '') $nums[] = $temp;
			$i = 0;
			while($i < count($nums)){
				if(preg_match('/\['.$nums[$i].'\]/', $GLOBALS['idList'])){
					table_products($nums[$i]);
					if($i+1 < count($nums))$GLOBALS['num'] = $nums[++$i];
					if($i+1 < count($nums))$GLOBALS['price'] = $nums[++$i];
					if($i+1 < count($nums))$GLOBALS['sum'] = $nums[++$i];
					table_caizhi();
					table_productclass();
					table_yanse();
					show($arr);
				}else $i += 3;
				$i++;
			}
		}
	} catch (PDOException $e) {
		$output = 'Error query ddmessage: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}
function Main(&$arr){
	try {
		$sql = 'SELECT ID,name,caizhi,idname,classid,yanshe FROM products WHERE idname LIKE "%'.$GLOBALS['xinghao'].'%" AND name LIKE "%'.$GLOBALS['proname'].'%"';
		if($GLOBALS['class'] != 0) $sql .= ' AND classid = '.$GLOBALS['class'].'';
		if($GLOBALS['yanse'] != 0) $sql .= ' AND yanshe = '.$GLOBALS['yanse'].'';
		$result = $GLOBALS['pdo']->query($sql);
		$flag = false;
		while($row = $result->fetch()){
			$GLOBALS['idList'] .= '['.$row['ID'].']';
			$flag = true;
		}
		if(!$flag){
			echo json_encode($arr);
			exit();
		}
		table_ddmessage($arr);
	} catch (PDOException $e) {
		$output = 'Error query products: ' . $e->getMessage();
		echo json_encode(array('wrong'=>$output));
		exit();
	}
}
Main($arr);
$runtime = number_format((microtime_float()-$starttime) , 4).'s';
//echo '<h4 align="center">【已结算：' . $Finish . '元】【 未结算：' . $Unfinish . '元】【总交易额：' . ($Finish+$Unfinish) . '元】【总交易量：' . $Final_num .'个】['.$runtime.']K</h4>';
//echo $Output . '</tbody></table>';
echo json_encode($arr);
//echo json_encode(array('wrong'=>$ttttt));

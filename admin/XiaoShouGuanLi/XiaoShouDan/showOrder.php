<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/db.inc.php';

$xinghao;
$yanse;
$caizhi;
$sumPrice = 0;
$sumNum = 0;

function getYanse($id){
	$sql = 'SELECT name FROM yanse WHERE ID="'.$id.'"';
	$s = $GLOBALS['pdo']->query($sql);
	if($row = $s->fetch()){
		return $row['name'];
	}
	return 'none';
}

function getCaizhi($id){
	$sql = 'SELECT name FROM caizhi WHERE ID="'.$id.'"';
	$s = $GLOBALS['pdo']->query($sql);
	if($row = $s->fetch()){
		return $row['name'];
	}
	return 'none';
}

function getPro($id){
	$sql = 'SELECT idname,caizhi,yanshe FROM products WHERE ID="'.$id.'"';
	$s = $GLOBALS['pdo']->query($sql);
	if($row = $s->fetch()){
		$GLOBALS['xinghao'] = $row['idname'];
		$GLOBALS['caizhi'] = getCaizhi($row['caizhi']);
		$GLOBALS['yanse'] = getYanse($row['yanshe']);
	}
}
if(session_id() == "") session_start();
if(isset($_SESSION['id'])){
	for ($i=0; $i<count($_SESSION['id']); $i++){
		getPro($_SESSION['id'][$i]);
		$sumNum += $_SESSION['num'][$i];
		$sumPrice += $_SESSION['price'][$i]*$_SESSION['num'][$i];
		echo '<tr class="success">
				<td>
				'.($i+1).'
				</td>
				<td>
				'.$xinghao.'
				</td>
				<td>
				'.$caizhi.'
				</td>
				<td>
				'.$yanse.'
				</td>
				<td style="width: 50px">
					<input id="price'.$i.'" type="text" value="'.$_SESSION['price'][$i].'" class="span12" onchange="modifyOrder('.$i.')">
				</td>
				<td style="width: 50px">
					<input id="num'.$i.'" type="text" value="'.$_SESSION['num'][$i].'" class="span10" onchange="modifyOrder('.$i.')">
				</td>
				<td style="width: 50px">
				'.($_SESSION['price'][$i]*$_SESSION['num'][$i]).'
				</td>
				<td>
					<input id="beizhu'.$i.'" type="text" value="'.$_SESSION['beizhu'][$i].'" class="span12" onchange="modifyOrder('.$i.')">
				</td>
				<td style="width: 60px">
					<button class="btn" onclick="deleteOrder('.$i.')">删除</button>
				</td>
			</tr>';
	}
}
echo '<tr class="info">
			<td colspan="5">
			</td>
			<td style="width: 50px">
			'.$sumNum.'
			</td>
			<td style="width: 50px">
			'.$sumPrice.'
			</td>
			<td>
			</td>
			<td style="width: 60px">
				<button class="btn span12" onclick="deleteOrder(-1)">删除全部</button>
			</td>
		</tr>';
?>
</body>
</html>
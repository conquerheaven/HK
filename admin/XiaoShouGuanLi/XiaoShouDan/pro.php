<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/db.inc.php';

$Pro = $_GET['Pro'];

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

try{
	$sql = 'SELECT ID,name,idname,pfrich,caizhi,yanshe FROM products WHERE idname LIKE "%'. $Pro . '%"';
	$s = $pdo->query($sql);
	echo '<table class="table">';
	while($row = $s->fetch()){
		$yanse = getYanse($row['yanshe']);
		$caizhi = getCaizhi($row['caizhi']);
		$text = '【名称：'.$row['name'].'】【型号：'.$row['idname']. '】【材质：' .$caizhi. '】【颜色：' .$yanse. '】【价格：' .$row['pfrich']. '元】';
		$text = str_ireplace($Pro, '<strong>'.$Pro.'</strong>', $text);
		echo '<tr><td><a onMouseDown="setOrder('.$row['ID'].','.$row['pfrich'].')">'.$text.'</a></td></tr>';
	}
	echo '</table>';
}catch (PDOException $e){
	echo $e;
	exit();
}
?>
</body>
</html>
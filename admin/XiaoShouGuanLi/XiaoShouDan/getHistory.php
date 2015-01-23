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
$_SESSION['kehuid'] = $id;

function getXinghao($id){
	$sql = 'SELECT idname FROM products WHERE ID="'.$id.'"';
	$s = $GLOBALS['pdo']->query($sql);
	if($row = $s->fetch()){
		return $row['idname'];
	}
	return 'none';
}

function getState($id){
	$sql = 'SELECT name FROM jiaoyistats WHERE ID="'.$id.'"';
	$s = $GLOBALS['pdo']->query($sql);
	if($row = $s->fetch()){
		return $row['name'];
	}
	return 'none';
}

try {
	$sql = 'SELECT xiadangtime,productsid,stats FROM ddmessage WHERE kehuid="'.$id.'"';
	$s = $pdo->query($sql);
	while ($row = $s->fetch()){
		$Pro = preg_split('/[^0-9]/', $row['productsid']);
		$State = getState($row['stats']);
		for($i=0; $i<count($Pro); $i+=4){
			$xinghao = getXinghao($Pro[$i]);
			$jianshu = $Pro[$i+1];
			$jine = $Pro[$i+2];
			echo '<tr class="success">
					<td>
					'.$row['xiadangtime'].'
					</td>
					<td>
					'.$xinghao.'
					</td>
					<td>
					'.$jianshu.'
					</td>
					<td>
					'.$jine.'
					</td>
					<td>
					'.$State.'
					</td>
				</tr>';
		}
	}
} catch (PDOException $e) {
	echo $e;
}
?>
</body>
</html>
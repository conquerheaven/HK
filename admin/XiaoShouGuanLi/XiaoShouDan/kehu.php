<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/db.inc.php';

$kehu = $_GET['kehu'];
try{
	$sql = 'SELECT ID,name,telephone FROM kehulist WHERE name LIKE "%'. $kehu . '%" OR telephone LIKE "%'. $kehu . '%"';
	$s = $pdo->query($sql);
	echo '<table class="table">';
	while($row = $s->fetch()){
		$text = '【'.$row['name'].'】【'.$row['telephone'].'】';
		$text = str_ireplace($kehu, '<strong>'.$kehu.'</strong>', $text);
		echo '<tr><td><a id="'.$row['ID'].'" onMouseDown="setKehu('.$row['ID'].')">'.$text.'</a></td></tr>';
	}
	echo '</table>';
}catch (PDOException $e){
	echo $e;
	exit();
}
?>
</body>
</html>
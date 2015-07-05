<?php
include 'db.inc.php';

$kehuid = $_GET['kehuid'];

try {
	$sql = 'select * from kehulist where ID = :kehuid';
	$s = $pdo->prepare($sql);
	$s->bindValue(':kehuid', $kehuid);
	$s->execute();
	if($row = $s->fetch()){
		$arr = array(
				're'=>'1',
				'kehuname'=>$row['name'] , 
				'addtime'=>$row['addtime'] ,
				'ename'=>$row['ename'] , 
				'tihuoyx'=>$row['tihuoyx'] ,
				'khlaiyuan'=>$row['khlaiyuan'] ,
				'baifangren'=>$row['baifangren'] ,
				'khpj'=>$row['khpj'] ,
				'khtuiguang'=>$row['khtuiguang'] ,
				'jsxz'=>$row['jsxz'] ,
				'zxdangci'=>$row['zxdangci'] ,
				'scname'=>$row['scname'] ,
				'scmianji'=>$row['scmianji'] ,
				'address'=>$row['address'] ,
				'scxingzhi'=>$row['scxingzhi'] ,
				'telephone'=>$row['telephone'] ,
				'dzname'=>$row['dzname'] ,
				'telephone2'=>$row['telephone2'] ,
				'dztelephone'=>$row['dztelephone'] ,
				'mobile'=>$row['mobile'] ,
				'dzqq'=>$row['dzqq'] ,
				'chuanzheng'=>$row['chuanzheng'] ,
				'dzqita'=>$row['dzqita'] ,
				'pingpai'=>$row['pingpai'] ,
				'pingpailx'=>$row['pplx'] ,
				'mianji1'=>$row['mj'] ,
				'jzpingpai'=>$row['pingpai2'] ,
				'chuyangnum'=>$row['chuyangnum'] ,
				'mianji2'=>$row['mj2'] ,
				'diqu'=>$row['dqid'] ,
				'sheng'=>$row['sheng'] ,
				'shi'=>$row['city'] ,
				'xian'=>$row['xian'] ,
				'tuoyunbu'=>$row['tybid'] ,
				'caozuoren'=>$row['caozuoren'] ,
				'pingjia'=>$row['pingjia'],
				'fuzheren'=>$row['fuzheren']
		);
	}
	echo json_encode($arr);
} catch (PDOException $e) {
	echo json_encode(array('re'=> $e));
}
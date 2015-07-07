<?php
include 'db.inc.php';

$kehuid = $_GET['kehuid'];
$kehuname = $_GET['kehuname'];
$addtime = $_GET['addtime'];
$ename = $_GET['ename'];
$scname = $_GET['scname'];
$scmianji = $_GET['scmianji'];
$address = $_GET['address'];
$telephone = $_GET['telephone'];
$dzname = $_GET['dzname'];
$telephone2 = $_GET['telephone2'];
$dztelephone = $_GET['dztelephone'];
$mobile = $_GET['mobile'];
$dzqq = $_GET['dzqq'];
$chuanzheng = $_GET['chuanzheng'];
$dzqita = $_GET['dzqita'];
$pingpai = $_GET['pingpai'];
$pingpailx = $_GET['pingpailx'];
$mianji1 = $_GET['mianji1'];
$jzpingpai = $_GET['jzpingpai'];
$chuyangnum = $_GET['chuyangnum'];
$mianji2 = $_GET['mianji2'];
$caozuoren = $_GET['caozuoren'];
$pingjia = $_GET['pingjia'];
$tihuoyx = $_GET['tihuoyx'];
$khlaiyuan = $_GET['khlaiyuan'];
$baifangren = $_GET['baifangren'];
$khpj = $_GET['khpj'];
$khtuiguang = $_GET['khtuiguang'];
$jsxz = $_GET['jsxz'];
$zxdangci = $_GET['zxdangci'];
$scxingzhi = $_GET['scxingzhi'];
$diqu = $_GET['diqu'];
$tuoyunbu = $_GET['tuoyunbu'];
$fuzheren = $_GET['fuzheren'];
$sheng = $_GET['sheng'];
$shi = $_GET['shi'];
$xian = $_GET['xian'];

try{
	$sql = 'UPDATE kehulist SET name=:name,khpj=:khpj,jsxz=:jsxz,ename=:ename,scname=:scname,address=:address,telephone=:telephone,telephone2=:telephone2,
			mobile=:mobile,chuanzheng=:chuanzheng,tybid=:tybid,dqid=:dqid,sheng=:sheng,city=:city,xian=:xian,pingpai=:pingpai,pplx=:pplx,mj=:mj,pingpai2=:pingpai2,mj2=:mj2,caozuoren=:caozuoren,
			addtime=:addtime,tihuoyx=:tihuoyx,baifangren=:baifangren,khtuiguang=:khtuiguang,zxdangci=:zxdangci,scmianji=:scmianji,scxingzhi=:scxingzhi,dzname=:dzname,dztelephone=:dztelephone,dzqq=:dzqq,dzqita=:dzqita,
			pingjia=:pingjia,khlaiyuan=:khlaiyuan,chuyangnum=:chuyangnum,fuzheren=:fuzheren WHERE ID = :kehuid';
	$s = $pdo->prepare($sql);
	$s->bindValue(':name',$kehuname);
	$s->bindValue(':khpj',$khpj);
	$s->bindValue(':jsxz',$jsxz);
	$s->bindValue(':ename',$ename);
	$s->bindValue(':scname',$scname);
	$s->bindValue(':address',$address);
	$s->bindValue(':telephone',$telephone);
	$s->bindValue(':telephone2',$telephone2);
	$s->bindValue(':mobile',$mobile);
	$s->bindValue(':chuanzheng',$chuanzheng);
	$s->bindValue(':tybid',$tuoyunbu);
	$s->bindValue(':dqid',$diqu);
	$s->bindValue(':sheng',$sheng);
	$s->bindValue(':city',$shi);
	$s->bindValue(':xian',$xian);
	$s->bindValue(':pingpai',$pingpai);
	$s->bindValue(':pplx',$pingpailx);
	$s->bindValue(':mj',$mianji1);
	$s->bindValue(':pingpai2',$jzpingpai);
	$s->bindValue(':mj2',$mianji2);
	$s->bindValue(':caozuoren',$caozuoren);
	$s->bindValue(':addtime',$addtime);
	$s->bindValue(':tihuoyx',$tihuoyx);
	$s->bindValue(':baifangren',$baifangren);
	$s->bindValue(':khtuiguang',$khtuiguang);
	$s->bindValue(':zxdangci',$zxdangci);
	$s->bindValue(':scmianji',$scmianji);
	$s->bindValue(':scxingzhi',$scxingzhi);
	$s->bindValue(':dzname',$dzname);
	$s->bindValue(':dztelephone',$dztelephone);
	$s->bindValue(':dzqq',$dzqq);
	$s->bindValue(':dzqita',$dzqita);
	$s->bindValue(':pingjia',$pingjia);
	$s->bindValue(':khlaiyuan',$khlaiyuan);
	$s->bindValue(':chuyangnum',$chuyangnum);
	$s->bindValue(':fuzheren', $fuzheren);
	$s->bindValue(':kehuid', $kehuid);
	$s->execute();
	echo json_encode(array('result'=>'1'));
}catch (PDOException $e){
	echo json_encode(array('result'=>'0' , 'message'=>$e));
}










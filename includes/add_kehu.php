<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12 well" align="center">
		<div id="loading"><img src="/HK/bootstrap/img/loading_small.gif"></div>
		</div>
	</div>
</div>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/foot.html';?>
<?php
include 'db.inc.php';

$kehuname = $_POST['kehuname'];
$addtime = $_POST['addtime'];
$ename = $_POST['ename'];
$tihuoyx = $_POST['tihuoyx'];
$khlaiyuan = $_POST['khlaiyuan'];
$baifangren = $_POST['baifangren'];
$khpj = $_POST['khpj'];
$khtuiguang = $_POST['khtuiguang'];
$jsxz = $_POST['jsxz'];
$zxdangci = $_POST['zxdangci'];
$scname = $_POST['scname'];
$scmianji = $_POST['scmianji'];
$address = $_POST['address'];
$scxingzhi = $_POST['scxingzhi'];
$telephone = $_POST['telephone'];
$dzname = $_POST['dzname'];
$telephone2 = $_POST['telephone2'];
$dztelephone = $_POST['dztelephone'];
$mobile = $_POST['mobile'];
$dzqq = $_POST['dzqq'];
$chuanzheng = $_POST['chuanzheng'];
$dzqita = $_POST['dzqita'];
$pingpai = $_POST['pingpai'];
$pingpailx = $_POST['pingpailx'];
$mianji1 = $_POST['mianji1'];
$jzpingpai = $_POST['jzpingpai'];
$chuyangnum = $_POST['chuyangnum'];
$mianji2 = $_POST['mianji2'];
$diqu = $_POST['diqu'];
$sheng = $_POST['sheng'];
$shi = $_POST['shi'];
$xian = $_POST['xian'];
$tuoyunbu = $_POST['tuoyunbu'];
$caozuoren = $_POST['caozuoren'];
$pingjia = $_POST['pingjia'];
$fuzheren = $_POST['fuzheren'];


try {
	$sql = 'select * from kehulist where name = :name and telephone = :telephone';
	$s = $pdo->prepare($sql);
	$s->bindValue(':name',$kehuname);
	$s->bindValue(':telephone',$telephone);
	$s->execute();
	if($row = $s->fetch()){
		?>
		<script type="text/javascript">
		$("#loading").html('<p>客户已存在！<a href="/HK/admin/KeHuGuanLi/kehuinfo.php">继续添加</a></p>');
		</script>
		<?php
		exit();
	}
	
	$sql = 'insert into kehulist(name,khpj,jsxz,ename,scname,address,telephone,telephone2,mobile,chuanzheng,tybid,dqid,sheng,city,xian,pingpai,pplx,mj,pingpai2,mj2,caozuoren,addtime,tihuoyx,baifangren,khtuiguang,zxdangci,scmianji,scxingzhi,dzname,dztelephone,dzqq,dzqita,pingjia,khlaiyuan,chuyangnum,fuzheren) values ';
	$sql .= '(:name,:khpj,:jsxz,:ename,:scname,:address,:telephone,:telephone2,:mobile,:chuanzheng,:tybid,:dqid,:sheng,:city,:xian,:pingpai,:pplx,:mj,:pingpai2,:mj2,:caozuoren,:addtime,:tihuoyx,:baifangren,:khtuiguang,:zxdangci,:scmianji,:scxingzhi,:dzname,:dztelephone,:dzqq,:dzqita,:pingjia,:khlaiyuan,:chuyangnum,:fuzheren)';
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
	$s->execute();
} catch (PDOException $e) {
	$error = $e.'数据库错误！';
	include 'error.php';
}
?>
<script type="text/javascript">
$("#loading").html('<p>添加客户成功！<a href="/HK/admin/KeHuGuanLi/kehuinfo.php">继续添加</a></p>');
</script>


















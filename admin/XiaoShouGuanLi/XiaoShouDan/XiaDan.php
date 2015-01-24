
<?php include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/head.html';?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>下单</title>
	<link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../../../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link href="../../../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
	<link href="../../../bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="../../../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../../bootstrap/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../../../bootstrap/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="../../../bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../../../bootstrap/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../../../bootstrap/js/ajax.js"></script>
	<script type="text/javascript">
	function showKehu(){
		document.getElementById("Kehumenu").style.display="block";
	}
	function hideKehu(){
		document.getElementById("Kehumenu").style.display="none";
	}
	function showPro(){
		document.getElementById("Promenu").style.display="block";
	}
	function hidePro(){
		document.getElementById("Promenu").style.display="none";
	}
	function setKehu(id){
		var kehu = document.getElementById(id).innerHTML;
		kehu = kehu.replace(/<strong>/g,'');
		kehu = kehu.replace(/<\/strong>/g,'');
		document.getElementById("kehu").value = kehu;
		hideKehu();
		history(id);//获取客户交易明细
	}
    </script>
    <style type="text/css"> 
	a:link { text-decoration: none;color: blue} 
	a:hover { text-decoration:none;color: red} 
	a:visited { text-decoration: none;color: green} 
	a{cursor:pointer}
	</style>
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8 well" align="center">
			<h2 class="text-center">
				销售下单
			</h2>
				<input id="kehu" class="span3" type="text" placeholder="客户名称/电话" onFocus="ReqKehu()" oninput="ReqKehu()" onBlur="hideKehu()"/>
				<div  data-spy="scroll" data-offset="0" id="Kehumenu" class="well" style="display:none;z-index:10;position:absolute;height:100px;overflow:auto" class="table-bordered table-condensed">
                 </div>
				&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn">新增客户</button>&nbsp;&nbsp;&nbsp;&nbsp;
				
				<button class="btn">新增托运部</button><br />
				<br><input id="Pro" class="span3" type="text" placeholder="产品型号" onFocus="ReqPro()" oninput="ReqPro()" onBlur="hidePro()"/>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn">新增产品</button>
				<div  data-spy="scroll" data-offset="0" id="Promenu" class="well" style="display:none;z-index:10;position:absolute;height:200px;overflow:auto" class="table-bordered table-condensed">
                 </div>
			<div data-spy="scroll" data-target="#navbar-example" data-offset="0" style="width:100%;height:300px;overflow:auto; position: relative;" class="table-bordered table-condensed">
				<table class="table table-bordered table-condensed table-striped table-hover">
					<thead>
						<tr>
							<th style="width: 50px">
								序号
							</th>
							<th style="width: 50px">
								型号
							</th>
							<th style="width: 50px">
								材质
							</th>
							<th style="width: 50px">
								颜色
							</th>
							<th style="width: 50px">
								单价
							</th>
							<th style="width: 50px">
								件数
							</th>
							<th style="width: 50px">
								合计
							</th>
							<th>
								备注
							</th>
							<th style="width: 60px">
								操作
							</th>
						</tr>
					</thead>
					<tbody id="Order">
					<?php include 'showOrder.php'?>
					</tbody>
				</table>
			</div><br>
			  送货时间：
             <input class="input-medium controls input-append date form_date" style="height: 30px;" type="text" value="" data-date-format="yyyy-MM-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" readonly>
			<input type="hidden" id="dtp_input2" value="" />
			<button class="btn">确认到送货单</button> <button class="btn">确认到订单</button> <button class="btn">返回</button>
		</div>
		<div class="span4 well">
			<h3 class="text-center">
				客户交易明细
			</h3>
			<div data-spy="scroll" data-target="#navbar-example" data-offset="0" style="width:100%;height:350px;overflow:auto; position: relative;" class="table-bordered table-condensed">
				<table class="table table-bordered table-condensed table-striped table-hover">
					<thead>
						<tr>
							<th>
								日期
							</th>
							<th>
								型号
							</th>
							<th>
								件数
							</th>
							<th>
								金额
							</th>
							<th>
								单据进展
							</th>
						</tr>
					</thead>
					<tbody id="History">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	</script>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/foot.html';?>

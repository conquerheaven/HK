<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>客户回访查询</title>
	<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link href="../../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
	<link href="../../bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/jquery.tmpl.min.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../../bootstrap/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../../bootstrap/js/ajax.js"></script>

	
<?php 
$pageId = '[0]';
include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/head.html';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/yanzheng.php';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/get_kehuname.php';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/get_scname.php';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/get_tihuoyx.php';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/get_province.php';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/get_scxingzhi.php';
?>
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12 well" align="center">
		客户类型：
		<select id="kehutype" class="span1" style="width: 100px">
		<option value="0">全部客户</option>
		<option value="1">交易过客户</option>
		<option value="2">未交易客户</option>
		</select>
		
		&nbsp;&nbsp;&nbsp;&nbsp;销售日期：<input type="text" placeholder="起始日期" id="starttime" data-date-format="yyyy-mm-dd" class="span1 datetime" style="width: 100px" />
		<span>至</span><input type="text" placeholder="结束日期" id="endtime" data-date-format="yyyy-mm-dd" class="span1 datetime" style="width: 100px" />
		
		&nbsp;&nbsp;&nbsp;&nbsp;地区：
		<select id="sheng" class="span1" style="width: 100px">
		<option value="0">全部</option>
		<?php 
		for($i = 0; $i < count($provinceID); $i++){
			echo '<option value="'.$provinceID[$i].'">'.$provinceName[$i].'</option>';
		}
		?>
		</select>省/市
		<select id="shi" class="span1" style="width: 100px">
		<option value="0">全部</option>
		</select>市/县
		<select id="xian" class="span1" style="width: 100px">
		<option value="0">全部</option>
		</select>县/区
		</br>
		</br>
		客户名称：
		<select id="kehuname" class="span2">
		<option value="0">全部客户</option>
		<?php 
		for($i = 0; $i < count($kehuid); $i++){
			echo '<option value="'.$kehuid[$i].'">【'.$kehuname[$i].'】【'.$kehutelephone[$i].'】</option>';
		}
		?>
		</select>
		
		&nbsp;&nbsp;&nbsp;&nbsp;商场名称：
		<select id="scname" class="span2">
		<option value="0">全部商场</option>
		<?php 
		for($i = 0; $i < count($scname); $i++){
			echo '<option value="'.$scname[$i].'">'.$scname[$i].'</option>';
		}
		?>
		</select>
		
		&nbsp;&nbsp;&nbsp;&nbsp;商场性质：
		<select id="scxingzhi" class="span2" style="width: 100px">
		<option value="0">全部商场</option>
		<?php 
		for($i = 0; $i < count($scxingzhiID); $i++){
			echo '<option value="'.$scxingzhiID[$i].'">'.$scxingzhiName[$i].'</option>';
		}
		?>
		</select>
		
		&nbsp;&nbsp;&nbsp;&nbsp;提货意向：
		<select id="tihuoyx" class="span1">
		<option value="0">全部</option>
		<?php 
		for($i = 0; $i < count($tihuoyxID); $i++){
			echo '<option value="'.$tihuoyxID[$i].'">'.$tihuoyxName[$i].'</option>';
		}
		?>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="搜索" class="btn btn-primary" id="query">
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12 well" align="center">
<fieldset id="resultDiv">
<table class="table" style="font-size:5px">
	<thead>
		<tr>
			<th>序号</th>
			<th>资料录入日期</th>
			<th>首次成交日期</th>
			<th>未交易天数</th>
			<th>交易次数</th>
			<th>省</th>
			<th>市</th>
			<th>县</th>
			<th>商店名称</th>
			<th>商店面积</th>
			<th>商店性质</th>
			<th>年销售额评估</th>
			<th>品牌名称</th>
			<th>客户名称</th>
			<th>客户负责人</th>
			<th>销售金额</th>
			<th>最后提货时间</th>
			<th>最后回访时间</th>
			<th>店员数量</th>
			<th>店长名称</th>
			<th>出样数量</th>
			<th>装修档次</th>
			<th>推广意识</th>
			<th>提货意向</th>
			<th>竞争品牌</th>
			<th>结算性质</th>
			<th>客户来源</th>
			<th>首拜访人</th>
		</tr>
		<tbody id="resultData"></tbody>
	</thead>
	
</table>
</fieldset>
		</div>
	</div>
</div>
<script type="text/javascript">
$('.datetime').datetimepicker({
		language:  'zh-CN',
	    weekStart: 1,
	    todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	}
);

$("#sheng").change(function(){
    $.getJSON(
    	    '/HK/includes/get_city.php',
    	    {provinceID:$("#sheng").val()},
    	    function(jsonData){
    	    	$("#shi").html($("#areaDataTemplate").tmpl(jsonData));
    	    }
	);
	$("#xian").html('<option value="0">全部</option>');
});

$("#shi").change(function(){
    $.getJSON(
    	    '/HK/includes/get_xian.php',
    	    {cityID:$("#shi").val()},
    	    function(jsonData){
    	    	$("#xian").html($("#areaDataTemplate").tmpl(jsonData));
    	    }
	);
});

$("#query").click(function(){
	var starttime = $("#starttime").val();
	var endtime = $("#endtime").val();
	if(starttime != null && endtime == null || (starttime == null && endtime != null)){
		alert("请选择起始或结束时间！");
		return;
	}
	if(starttime != null && endtime != null){
		if(starttime > endtime){
			alert("起始时间不能大于结束时间！");
			return;
		}
	}
	if(starttime == null && endtime == null){
		starttime="";
		endtime="";
	}
	$.getJSON(
			'/HK/includes/get_huifang.php',
			{
			kehutype:$("#kehutype").val(),
			starttime:starttime,
			endtime:endtime,
			provincecode:$("#sheng").val(),
			citycode:$("#shi").val(),
			areacode:$("#xian").val(),
			kehuid:$("#kehuname").val(),
			scname:$("#scname").val(),
			scxingzhi:$("#scxingzhi").val(),
			tihuoyx:$("#tihuoyx").val()
			},
			function(jsonData){
				$("#resultData").html($("#resultDataTemplate").tmpl(jsonData));
			}
	);
	
});
</script>
<script id="areaDataTemplate" type="text/x-jQuery-tmpl">
	<option value="${dataID}">${dataValue}</option>
</script>
<script id="resultDataTemplate" type="text/x-jQuery-tmpl">
<tr class="success">
<td>${xuhao}</td>
<td>${addtime}</td>
<td>${firstjytime}</td>
<td>${nojyday}</td>
<td>${jytimes}</td>
<td>${province}</td>
<td>${city}</td>
<td>${area}</td>
<td>${scname}</td>
<td>${scmianji}</td>
<td>${scxingzhi}</td>
<td>${yearsaleval}</td>
<td>${pinpai}</td>
<td>${kehuname}</td>
<td>${fuzeren}</td>
<td>${totalsale}</td>
<td>${lastthtime}</td>
<td>${lasthftime}</td>
<td>${dianyuannum}</td>
<td>${dzname}</td>
<td>${chuyangnum}</td>
<td>${zxdangci}</td>
<td>${tgyishi}</td>
<td>${tihuoyx}</td>
<td>${competepinpai}</td>
<td>${jsxingzhi}</td>
<td>${khlaiyuan}</td>
<td>${baifangren}</td>
</tr>
</script>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/foot.html';?>
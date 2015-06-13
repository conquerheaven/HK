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
	<script type="text/javascript" src="../../bootstrap/js/jquery-session.js"></script>
	
<?php 
$pageId = '[0]';
include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/head.html';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/yanzheng.php';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/get_kehuname.php';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/get_scname.php';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/get_tihuoyx.php';
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
		<select id="diqu" class="span1" style="width: 100px">
		<option value="-1">全部</option>
		</select>省份
		<select id="sheng" class="span1" style="width: 100px">
		<option value="-1">全部</option>
		</select>城市
		<select id="shi" class="span1" style="width: 100px">
		<option value="-1">全部</option>
		</select>县/区
		<select id="xian" class="span1" style="width: 100px">
		<option value="-1">全部</option>
		</select>
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
		<div class="span12 well" align="center" id="Result" style="display: none">
		<div id="loading"><img src="/HK/bootstrap/img/loading_mid.gif"></div>
		<div id="noresult">无数据</div>
<div id="resultDiv" data-spy="scroll" data-offset="0" style="width:110%;height:75%;overflow:auto; position: relative;" class="well table-bordered table-condensed">
<table class="table table-bordered table-condensed table-striped table-hover" style="font-size:5px">
	<thead>
		<tr style="expression(this.offsetParent.scrollTop)">
			<th style="text-align:center">序号</th>
			<th style="text-align:center">资料录入日期</th>
			<th style="text-align:center">首次成交日期</th>
			<th style="text-align:center">未交易天数</th>
			<th style="text-align:center">交易次数</th>
			<th style="text-align:center">省</th>
			<th style="text-align:center">市</th>
			<th style="text-align:center">县</th>
			<th style="text-align:center">商店名称</th>
			<th style="text-align:center">商店面积</th>
			<th style="text-align:center">商店性质</th>
			<th style="text-align:center">年销售额评估</th>
			<th style="text-align:center">品牌名称</th>
			<th style="text-align:center">客户名称</th>
			<th style="text-align:center">客户负责人</th>
			<th style="text-align:center">销售金额</th>
			<th style="text-align:center">最后提货时间</th>
			<th style="text-align:center">最后回访时间</th>
			<th style="text-align:center">店员数量</th>
			<th style="text-align:center">店长名称</th>
			<th style="text-align:center">出样数量</th>
			<th style="text-align:center">装修档次</th>
			<th style="text-align:center">推广意识</th>
			<th style="text-align:center">提货意向</th>
			<th style="text-align:center">竞争品牌</th>
			<th style="text-align:center">结算性质</th>
			<th style="text-align:center">客户来源</th>
			<th style="text-align:center">首拜访人</th>
		</tr>
		<tbody id="resultData"></tbody>
	</thead>
	
</table>
</div>
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

$.getJSON(
	    '/HK/includes/get_area.php',
	    {preID:0},
	    function(jsonData){
	    	$("#diqu").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$("#diqu").change(function(){
    $.getJSON(
    	    '/HK/includes/get_province.php',
    	    {areaID:$("#diqu").val()},
    	    function(jsonData){
    	    	$("#sheng").html($("#areaDataTemplate").tmpl(jsonData));
    	    }
	);
    $("#shi").html('<option value="-1">全部</option>');
	$("#xian").html('<option value="-1">全部</option>');
});

$("#sheng").change(function(){
    $.getJSON(
    	    '/HK/includes/get_city.php',
    	    {provinceID:$("#sheng").val()},
    	    function(jsonData){
    	    	$("#shi").html($("#areaDataTemplate").tmpl(jsonData));
    	    }
	);
	$("#xian").html('<option value="-1">全部</option>');
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
	$("#Result").slideDown("fast");
	$("#loading").show();
	$("#resultDiv").hide();
	$("#noresult").hide();
	var starttime = $("#starttime").val();
	var endtime = $("#endtime").val();
	//alert(starttime+endtime.length);
	if(starttime.length != 0 && endtime.length == 0 || (starttime.length == 0 && endtime.length != 0)){
		alert("请选择起始或结束时间！");
		$("#loading").hide();
		return;
	}
	if(starttime.length != 0 && endtime.length != 0){
		if(starttime > endtime){
			alert("起始时间不能大于结束时间！");
			$("#loading").hide();
			return;
		}
	}
	if(starttime.length == 0 && endtime.length == 0){
		starttime="";
		endtime="";
	}
	//alert($("#shi").val());
	//alert($("#diqu").val()+$("#sheng").val()+$("#shi").val()+$("#xian").val());
	$.getJSON(
			'/HK/includes/get_huifang.php',
			{
			kehutype:$("#kehutype").val(),
			starttime:starttime,
			endtime:endtime,
			areaid:$("#diqu").val(),
			provinceid:$("#sheng").val(),
			cityid:$("#shi").val(),
			countyid:$("#xian").val(),
			kehuid:$("#kehuname").val(),
			scname:$("#scname").val(),
			scxingzhi:$("#scxingzhi").val(),
			tihuoyx:$("#tihuoyx").val()
			},
			function(jsonData){
				$("#loading").hide();
				if(jsonData.length == 0) $("#noresult").show();
				else{
					$("#resultData").html($("#resultDataTemplate").tmpl(jsonData));
					$("#resultDiv").slideDown("fast");
				}
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
<td>${county}</td>
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
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>产品销售查询</title>
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
	<script type="text/javascript" src="../../bootstrap/js/jquery.freezeheader.js"></script>
	
<?php 
$pageId = '[0]';
include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/head.html';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/yanzheng.php';
?>
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12 well" style="font-size: 12px;">
		【日期/地区】
		
		选择日期：<input type="text" placeholder="起始日期" id="starttime" data-date-format="yyyy-mm-dd" class="span1 datetime" style="font-size: 12px;" />
		<span>至</span><input type="text" placeholder="结束日期" id="endtime" data-date-format="yyyy-mm-dd" class="span1 datetime" style="font-size: 12px;" />
		
		地区：
		<select id="diqu" class="span1" style="font-size: 12px;">
		<option value="-1">全部</option>
		</select>省份
		<select id="sheng" class="span1" style="font-size: 12px;">
		<option value="-1">全部</option>
		</select>城市
		<select id="shi" class="span1" style="font-size: 12px;">
		<option value="-1">全部</option>
		</select>县/区
		<select id="xian" class="span1" style="font-size: 12px;">
		<option value="-1">全部</option>
		</select>
		</br>
		
		【客户信息】
		品牌：
		<select id="pinpai" class="span2" style="font-size: 12px;">
		</select>
		客户负责人：
		<select id="fuzeren" class="span1" style="font-size: 12px;">
		</select>
		家具城：
		<select id="jiajucheng" class="span2" style="font-size: 12px;">
		</select>
		托运部：
		<select id="tuoyunbu" class="span2" style="font-size: 12px;">
		</select>
		<input id="kehu" name="kehu" type="text" class="span2" placeholder="客户名称（全部）" style="font-size: 12px;">
		
		<br>
                         【产品信息】
		产品分类选择：
		<select id="class" class="span2" style="font-size: 12px;">
		</select>
		颜色：
		<select id="yanse" class="span1" style="font-size: 12px;">
		</select>
		<input id="xinghao" name="xinghao" type="text" class="span1" style="font-size: 12px;" placeholder="型号（全部）">
		<input id="proname" name="proname" type="text" class="span2" style="font-size: 12px;" placeholder="产品名称（全部）">
		
		<br>
		【订单信息】
		订单状态：
		<select id="status" name="status" class="span1" style="font-size: 12px;"> 
		<option value="all">全部</option>
		<option value="0">下单未发货</option>
		<option value="3">已结算</option>
		<option value="5">回单</option>
		</select>
		开单人：
		<select id="kaidanren" name="kaidanren" class="span1" style="font-size: 12px;"> 
		</select>
		发货人：
		<select id="fahuoren" name="fahuoren" class="span1" style="font-size: 12px;"> 
		</select>
		收款方式：
		<select id="shoukuanfs" name="shoukuanfs" class="span1" style="font-size: 12px;"> 
		<option value="">全部</option>
		<option value="补">补</option>
		<option value="店">店</option>
		<option value="托单">托单</option>
		<option value="打款">打款</option>
		<option value="签单">签单</option>
		<option value="代收">代收</option>
		<option value="现金">现金</option>
		<option value="客户打款">客户打款</option>
		</select>
		<input id="tuoyunhao" name="tuoyunhao" type="text" class="span2" placeholder="托运单号（全部）" style="font-size: 12px;">
		<input id="danhao" name="danhao" type="text" class="span2" placeholder="单号（全部）" style="font-size: 12px;">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="查询" class="btn btn-primary" id="query">
		<input type="button" value="下载" class="btn btn-success" id="download">
		</div>
	</div>
</div>
<div class="container-fluid well" align="center" id="Result" style="display: none;">
		<div id="loading"><img src="/HK/bootstrap/img/loading_mid.gif"></div>
		<div id="noresult">无数据</div>
<form action="/HK/includes/download.php" method="post" target="_blank" id="download_form">
<textarea name="download_table" id="download_table" style="display: none"></textarea>
</form>
<div id="resultDiv">
<table class="table-bordered table-striped table-hover" style="font-size:5px;text-align:center" id="table">
	<thead>
		<tr Bgcolor="#CCCCCC">
			<th  style="text-align:center">单号</th>
			<th  style="text-align:center">下单时间</th>
			<th  style="text-align:center">大类</th>
			<th  style="text-align:center">产品名称</th>
			<th  style="text-align:center">产品型号</th>
			<th  style="text-align:center">材质</th>
			<th  style="text-align:center">颜色</th>
			<th  style="text-align:center">数量</th>
			<th  style="text-align:center">单价</th>
			<th  style="text-align:center">小计</th>
			<th  style="text-align:center">订单状态</th>
			<th  style="text-align:center">收款方式</th>
			<th  style="text-align:center">托运号</th>
			<th  style="text-align:center">托运部</th>
			<th  style="text-align:center">发货人</th>
			<th  style="text-align:center">省</th>
			<th  style="text-align:center">市</th>
			<th  style="text-align:center">县/区</th>
			<th  style="text-align:center">客户名称</th>
			<th  style="text-align:center">客户电话</th>
			<th  style="text-align:center">客户地址</th>
			<th  style="text-align:center">客户负责人</th>
			<th  style="text-align:center">开单人</th>
			<th  style="text-align:center">收款日期</th>
		</tr>
		<tbody id="resultData"></tbody>
	</thead>
</table>
</div>
	</div>
<script type="text/javascript">
$("#query").click(function(){
	$("#Result").slideDown("fast");
	$("#loading").show();
	$("#resultDiv").hide();
	$("#noresult").hide();
	var starttime = $("#starttime").val();
	var endtime = $("#endtime").val();
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
	$.getJSON(
			'/HK/includes/get_chanpinxiaoshou.php',
			{
			leixing:$("#class").val(),
			xinghao:$("#xinghao").val(),
			yanse : $("#yanse").val(),
			area : $("#diqu").val(),
			province : $("#sheng").val(),
			city : $("#shi").val(),
			xian : $("#xian").val(),
			status : $("#status").val(),
			start : $("#starttime").val(),
			end : $("#endtime").val(),
			proname : $("#proname").val(),
			pinpai : $("#pinpai").val(),
			fuzeren : $("#fuzeren").val(),
			jiajucheng :$("#jiajucheng").val(),
			kehu : $("#kehu").val(),
			shoukuanfs : $("#shoukuanfs").val(),
			kaidanren : $("#kaidanren").val(),
			fahuoren : $("#fahuoren").val(),
			tuoyunbu : $("#tuoyunbu").val(),
			tuoyunhao : $("#tuoyunhao").val(),
			danhao : $("#danhao").val()
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

$('.datetime').datetimepicker({
	language:  'zh-CN',
    weekStart: 1,
    todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0,
	defaultDate: '-1 M'
}
);

$('.datetime').datetimepicker('setDate',new Date());

$.getJSON(
	    '/HK/includes/get_tuoyunbu.php',
	    function(jsonData){
	    	$("#tuoyunbu").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_scname.php',
	    function(jsonData){
	    	$("#jiajucheng").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_pingpai.php',
	    function(jsonData){
	    	$("#pinpai").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_fhr.php',
	    function(jsonData){
	    	$("#fahuoren").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_fuzherenINkehulist.php',
	    function(jsonData){
	    	$("#fuzeren").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_chaozuorenINdd.php',
	    function(jsonData){
	    	$("#kaidanren").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_productclass.php',
	    function(jsonData){
	    	$("#class").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_yanse.php',
	    function(jsonData){
	    	$("#yanse").html($("#areaDataTemplate").tmpl(jsonData));
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
</script>
<script id="areaDataTemplate" type="text/x-jQuery-tmpl">
	<option value="${dataID}">${dataValue}</option>
</script>
<script id="resultDataTemplate" type="text/x-jQuery-tmpl">
<tr class="${class}">
<td>${danhao}</td>
<td>${time}</td>
<td>${leixing}</td>
<td>${name}</td>
<td>${style}</td>
<td>${caizhi}</td>
<td>${color}</td>
<td>${num}</td>
<td>${price}</td>
<td>${sum}</td>
<td>${shoukuanqk}</td>
<td>${shoukuanfs}</td>
<td>${tuoyunhao}</td>
<td>${tuoyunbu}</td>
<td>${fhr}</td>
<td>${addr_sheng}</td>
<td>${addr_shi}</td>
<td>${addr_xian}</td>
<td>${kehuname}</td>
<td>${telephone}</td>
<td>${address}</td>
<td>${fuzeren}</td>
<td>${kaidanren}</td>
<td>${shoukuanri}</td>
</tr>
</script>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/foot.html';?>
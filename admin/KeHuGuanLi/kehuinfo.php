<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>客户资料录入</title>
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
	<script type="text/javascript" src="../../bootstrap/js/zDialog.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/zDrag.js"></script>
	
<?php 
$pageId = '[0]';
include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/head.html';
include $_SERVER['DOCUMENT_ROOT'].'HK/includes/yanzheng.php';
?>
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12 well" align="center">
		<table border="1" bordercolor="white" style="border-collapse:collapse;">
		<tr>
			<td>客户名称：</td>
			<td><input type="text" placeholder="客户名称" id="kehuname" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>录入日期：</td>
			<td><input type="text" placeholder="录入日期" id="addtime" class="span12" /></td>
		</tr>
		<tr>
			<td>客户名称简写：</td>
			<td><input type="text" placeholder="客户名称简写" id="ename" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>提货意向：</td>
			<td>
				<select id="tihuoyx" class="span8">
				</select>
			</td>
		</tr>
		<tr>
			<td>客户来源：</td>
			<td>
				<select id="khlaiyuan" class="span8">
				<option value="-1">全部</option>
				</select>
			</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>客户拜访人：</td>
			<td>
				<select id="baifangren" class="span8">
				<option value="-1">全部</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>客户评级：</td>
			<td>
				<select id="khpj" class="span8">
				<option value="-1">全部</option>
				</select>
			</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>客户推广：</td>
			<td>
				<select id="khtuiguang" class="span8">
				</select>
			</td>
		</tr>
		<tr>
			<td>客户结算性质：</td>
			<td>
				<select id="jsxz" class="span8">
				<option value="-1">全部</option>
				</select>
			</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>装修档次：</td>
			<td>
				<select id="zxdangci" class="span8">
				</select>
			</td>
		</tr>
		<tr>
			<td>商场名称：</td>
			<td><input type="text" placeholder="商场名称" id="scname" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>商场面积：</td>
			<td><input type="text" placeholder="商场面积" id="scmianji" class="span12" /></td>
		</tr>
		<tr>
			<td>客户地址：</td>
			<td><input type="text" placeholder="客户地址" id="address" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>商场性质：</td>
			<td>
				<select id="scxingzhi" class="span8">
				<option value="-1">全部</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>客户电话：</td>
			<td><input type="text" placeholder="客户电话" id="telephone" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>店长：</td>
			<td><input type="text" placeholder="店长姓名" id="dzname" class="span12" /></td>
		</tr>
		<tr>
			<td>QQ或电话：</td>
			<td><input type="text" placeholder="QQ或电话" id="telephone2" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>店长电话：</td>
			<td><input type="text" placeholder="客户电话" id="dztelephone" class="span12" /></td>
		</tr>
		<tr>
			<td>手机：</td>
			<td><input type="text" placeholder="手机" id="mobile" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>店长QQ：</td>
			<td><input type="text" placeholder="店长QQ" id="dzqq" class="span12" /></td>
		</tr>
		<tr>
			<td>传真：</td>
			<td><input type="text" placeholder="传真" id="chuanzheng" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>店长其他：</td>
			<td><input type="text" placeholder="店长其他" id="dzqita" class="span12" /></td>
		</tr>
		<tr>
			<td>品牌：</td>
			<td><input type="text" placeholder="品牌" id="pingpai" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>品牌类型：</td>
			<td><input type="text" placeholder="品牌类型" id="pingpailx" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>面积：</td>
			<td><input type="text" placeholder="面积" id="mianji1" class="span4" /></td>
		</tr>
		<tr>
			<td>竞争品牌：</td>
			<td><input type="text" placeholder="竞争品牌" id="jzpingpai" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>出样数量：</td>
			<td><input type="text" placeholder="出样呢数量" id="chuyangnum" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>面积：</td>
			<td><input type="text" placeholder="面积" id="mianji2" class="span4" /></td>
		</tr>
		<tr>
			<td>所属地区：</td>
			<td colspan = "4">
			<select id="diqu" class="span3">
			<option value="-1">请选择地区</option>
			</select>
			
			<select id="sheng" class="span3">
			<option value="-1">请选择省份</option>
			</select>
			
			<select id="shi" class="span3">
			<option value="-1">请选择城市</option>
			</select>
			
			<select id="xian" class="span3">
			<option value="-1">请选择区县</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>托运部：</td>
			<td colspan = "3">
			<select id="tuoyunbu" class="span12">
			</select>
			</td>
			<td align="center"><a href="#" onclick="addtyb()">新增托运部</a></td>
		</tr>
		<tr>
			<td>已有图片：</td>
			<td colspan = "4"></td>
		</tr>
		<tr>
			<td>上传图片：</td>
			<td><input type="text" readonly="readonly" placeholder="点击浏览" id="img" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>资料录入人：</td>
			<td><input type="text" readonly="readonly" id="caozuoren" class="span12" /></td>
		</tr>
		<tr>
			<td>评价简述：</td>
			<td colspan = "4"><textarea rows="3" columns="4" id="pingjia"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="button" class="btn btn-success" id="submit" value="提 交" /></td>
			<td></td>
		</tr>
		</table>
		</div>
	</div>
</div>

<div id="dialog" title="div层对话框">
<p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
<p>柯乐义：这是一个弹出div层对话框，可用于显示信息。可以拖动和关闭这个弹出层，还可以改变它的大小。 </p>
</div>
<script type="text/javascript">
$.getJSON(
	    '/HK/includes/get_tuoyunbu.php',
	    function(jsonData){
	    	$("#tuoyunbu").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_jsxz.php',
	    function(jsonData){
	    	$("#jsxz").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_zxdangci.php',
	    function(jsonData){
	    	$("#zxdangci").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_khtuiguang.php',
	    function(jsonData){
	    	$("#khtuiguang").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_tihuoyx.php',
	    function(jsonData){
	    	$("#tihuoyx").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_khlaiyuan.php',
	    function(jsonData){
	    	$("#khlaiyuan").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_area.php',
	    {preID:0},
	    function(jsonData){
	    	$("#diqu").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);


$.getJSON(
	    '/HK/includes/get_scxingzhi.php',
	    function(jsonData){
	    	$("#scxingzhi").html($("#areaDataTemplate").tmpl(jsonData));
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
    $("#shi").html('<option value="-1">请选择城市</option>');
	$("#xian").html('<option value="-1">请选择区县</option>');
});

$("#sheng").change(function(){
    $.getJSON(
    	    '/HK/includes/get_city.php',
    	    {provinceID:$("#sheng").val()},
    	    function(jsonData){
    	    	$("#shi").html($("#areaDataTemplate").tmpl(jsonData));
    	    }
	);
	$("#xian").html('<option value="-1">请选择区县</option>');
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

function addtyb(){
	alert("sd");
	$("#dialog" ).dialog();
}
</script>
<script id="areaDataTemplate" type="text/x-jQuery-tmpl">
	<option value="${dataID}">${dataValue}</option>
</script>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/foot.html';?>
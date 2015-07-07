<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>修改客户资料</title>
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
	<script type="text/javascript" src="../../bootstrap/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/bootstrap-alert.js"></script>
	<script type="text/javascript" src="../../bootstrap/js/jquery.validate.min.js"></script>
	
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
		请选择客户：
		<select id="kehuid" class="span2">
		</select>
		<div id="loading" style="display: none"><img src="/HK/bootstrap/img/loading_small.gif"></div>
		<div id="result" style="display: none"></div>
		<div id="kehuinfo" style="display: none">
		<form id="addkehu" action="">
		<table>
		<tr>
			<td><font color="#FF0000">*</font>客户名称：</td>
			<td><font color="#FF0000"><input type="text" placeholder="客户名称" id="kehuname" name="kehuname" class="span12" /></font></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>录入日期：</td>
			<td><input type="text" readonly="readonly" placeholder="录入日期" id="addtime" name="addtime" class="span12" /></td>
		</tr>
		<tr>
			<td>客户名称简写：</td>
			<td><input type="text" placeholder="客户名称简写" id="ename" name="ename" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>提货意向：</td>
			<td>
				<select id="tihuoyx" name="tihuoyx" class="span8">
				</select>
			</td>
		</tr>
		<tr>
			<td>客户来源：</td>
			<td>
				<select id="khlaiyuan" name="khlaiyuan" class="span8">
				</select>
			</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>客户拜访人：</td>
			<td>
				<select id="baifangren" name="baifangren" class="span8">
				</select>
			</td>
		</tr>
		<tr>
			<td>客户评级：</td>
			<td>
				<select id="khpj" name="khpj" class="span8">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				</select>
			</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>客户推广：</td>
			<td>
				<select id="khtuiguang" name="khtuiguang" class="span8">
				</select>
			</td>
		</tr>
		<tr>
			<td>客户结算性质：</td>
			<td>
				<select id="jsxz" name="jsxz" class="span8">
				</select>
			</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>装修档次：</td>
			<td>
				<select id="zxdangci" name="zxdangci" class="span8">
				</select>
			</td>
		</tr>
		<tr>
			<td>商场名称：</td>
			<td><input type="text" placeholder="商场名称" id="scname" name="scname" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>商场面积：</td>
			<td><input type="text" placeholder="商场面积" id="scmianji" name="scmianji" class="span12" /></td>
		</tr>
		<tr>
			<td>客户地址：</td>
			<td><input type="text" placeholder="客户地址" id="address" name="address" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>商场性质：</td>
			<td>
				<select id="scxingzhi" name="scxingzhi" class="span8">
				</select>
			</td>
		</tr>
		<tr>
			<td><font color="#FF0000">*</font>客户电话：</td>
			<td><font color="#FF0000"><input type="text" placeholder="客户电话" id="telephone" name="telephone" class="span12" /></font></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>店长：</td>
			<td><input type="text" placeholder="店长姓名" id="dzname" name="dzname" class="span12" /></td>
		</tr>
		<tr>
			<td>QQ或电话：</td>
			<td><input type="text" placeholder="QQ或电话" id="telephone2" name="telephone2" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>店长电话：</td>
			<td><input type="text" placeholder="店长电话" id="dztelephone" name="dztelephone" class="span12" /></td>
		</tr>
		<tr>
			<td>手机：</td>
			<td><input type="text" placeholder="手机" id="mobile" name="mobile" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>店长QQ：</td>
			<td><input type="text" placeholder="店长QQ" id="dzqq" name="dzqq" class="span12" /></td>
		</tr>
		<tr>
			<td>传真：</td>
			<td><input type="text" placeholder="传真" id="chuanzheng" name="chuanzheng" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>店长其他：</td>
			<td><input type="text" placeholder="店长其他" id="dzqita" name="dzqita" class="span12" /></td>
		</tr>
		<tr>
			<td>品牌：</td>
			<td><input type="text" placeholder="品牌" id="pingpai" name="pingpai" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>品牌类型：</td>
			<td><input type="text" placeholder="品牌类型" id="pingpailx" name="pingpailx" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>面积：</td>
			<td><input type="text" placeholder="面积" id="mianji1" name="mianji1" class="span4" /></td>
		</tr>
		<tr>
			<td>竞争品牌：</td>
			<td><input type="text" placeholder="竞争品牌" id="jzpingpai" name="jzpingpai" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>出样数量：</td>
			<td><input type="text" placeholder="出样数量" id="chuyangnum" name="chuyangnum" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>面积：</td>
			<td><input type="text" placeholder="面积" id="mianji2" name="mianji2" class="span4" /></td>
		</tr>
		<tr>
			<td>所属地区：</td>
			<td colspan = "4">
			<select id="diqu" name="diqu" class="span3">
			<option value="-1">请选择地区</option>
			</select>
			
			<select id="sheng" name="sheng" class="span3">
			<option value="-1">请选择省份</option>
			</select>
			
			<select id="shi" name="shi" class="span3">
			<option value="-1">请选择城市</option>
			</select>
			
			<select id="xian" name="xian" class="span3">
			<option value="-1">请选择区县</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>托运部：</td>
			<td colspan = "3">
			<select id="tuoyunbu" name="tuoyunbu" class="span12">
			</select>
			</td>
			<td align="center"><a href="#myModal" data-toggle="modal">新增托运部</a></td>
		</tr>
		<tr>
			<td>客户负责人：</td>
			<td>
				<select id="fuzheren" name="fuzheren" class="span8">
				</select>
			</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>已有图片：</td>
			<td colspan = "4"></td>
		</tr>
		<tr>
			<td>上传图片：</td>
			<td><input type="text" readonly="readonly" placeholder="点击浏览" id="img" name="img" class="span12" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>资料录入人：</td>
			<td><input type="text" readonly="readonly" id="caozuoren" name="caozuoren" class="span12"/></td>
		</tr>
		<tr>
			<td>评价简述：</td>
			<td colspan = "4"><textarea rows="3" columns="4" id="pingjia" name="pingjia"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="submit" class="btn btn-success" id="submit" value="修改" /></td>
			<td></td>
		</tr>
		</table>
		</form>
		</div>
		</div>
	</div>
</div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">新增托运部</h3>
  </div>
  <div class="modal-body" align="center">
    <table border="1" bordercolor="green" style="border-collapse:collapse;">
    <tr>
    	<td>名&nbsp;&nbsp;&nbsp;&nbsp;称：</td>
    	<td><input type="text" placeholder="托运部名称" id="tybname" class="span2" /></td>
    </tr>
    <tr>
    	<td>电&nbsp;&nbsp;&nbsp;&nbsp;话：</td>
    	<td><input type="text" placeholder="托运部电话" id="tybtelephone" class="span2" /></td>
    </tr>
    <tr>
    	<td>地&nbsp;&nbsp;&nbsp;&nbsp;址：</td>
    	<td><input type="text" placeholder="托运部地址" id="tybaddress" class="span4" /></td>
    </tr>
    <tr>
    	<td>目的地：</td>
    	<td><input type="text" placeholder="托运部目的地" id="tybitem" class="span2" /></td>
    </tr>
    </table>
    <div id="addtybresult" style="display: none">
    <div id="tybloading"><img src="/HK/bootstrap/img/loading_small.gif"></div>
	<div id="tybwrong"><font color="#FF0000">请填写完整信息！</font></div>
	<div id="tybsuccess">添加成功！</div>
	<div id="tybfailed">添加失败！</div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    <button class="btn btn-primary" onclick="addtyb()">保存</button>
  </div>
</div>

<script type="text/javascript">
$.getJSON(
	    '/HK/includes/get_kehuname.php',
	    function(jsonData){
	    	$("#kehuid").html($("#kehuDataTemplate").tmpl(jsonData));
	    }
);

$("#kehuid").change(function(){
	$("#kehuinfo").slideUp("fast");
	$("#loading").slideDown("fast");
	$("#result").hide();
	var kehuid = $("#kehuid").val();
	if(kehuid == 0){
		$("#loading").slideUp("fast");
		return;
	}
	$.ajaxSettings.async = false;
	$.getJSON(
			'/HK/includes/get_kehuinfo.php',
			{kehuid:kehuid},
			function(jsonData){
				if(jsonData['re'] != 1){
					$("#loading").slideUp("fast");
					alert('数据库错误！！'+jsonData['re']);
					return;
				}
				$("#kehuname").val(jsonData['kehuname']);
				$("#addtime").val(jsonData['addtime']);
				$("#ename").val(jsonData['ename']);
				$("#scname").val(jsonData['scname']);
				$("#scmianji").val(jsonData['scmianji']);
				$("#address").val(jsonData['address']);
				$("#telephone").val(jsonData['telephone']);
				$("#dzname").val(jsonData['dzname']);
				$("#telephone2").val(jsonData['telephone2']);
				$("#dztelephone").val(jsonData['dztelephone']);
				$("#mobile").val(jsonData['mobile']);
				$("#dzqq").val(jsonData['dzqq']);
				$("#chuanzheng").val(jsonData['chuanzheng']);
				$("#dzqita").val(jsonData['dzqita']);
				$("#pingpai").val(jsonData['pingpai']);
				$("#pingpailx").val(jsonData['pingpailx']);
				$("#mianji1").val(jsonData['mianji1']);
				$("#jzpingpai").val(jsonData['jzpingpai']);
				$("#chuyangnum").val(jsonData['chuyangnum']);
				$("#mianji2").val(jsonData['mianji2']);
				$("#caozuoren").val(jsonData['caozuoren']);
				$("#pingjia").val(jsonData['pingjia']);
				$("#tihuoyx").val(jsonData['tihuoyx']);
				$("#khlaiyuan").val(jsonData['khlaiyuan']);
				$("#baifangren").val(jsonData['baifangren']);
				$("#khpj").val(jsonData['khpj']);
				$("#khtuiguang").val(jsonData['khtuiguang']);
				$("#jsxz").val(jsonData['jsxz']);
				$("#zxdangci").val(jsonData['zxdangci']);
				$("#scxingzhi").val(jsonData['scxingzhi']);
				$("#diqu").val(jsonData['diqu']);
				$("#tuoyunbu").val(jsonData['tuoyunbu']);
				$("#fuzheren").val(jsonData['fuzheren']);
				if(jsonData['sheng']>0){
					refresh_sheng(jsonData['sheng']);
					$("#sheng").val(jsonData['sheng']);
				}
				if(jsonData['shi']>0){
					refresh_shi();
					$("#shi").val(jsonData['shi']);
				}
				if(jsonData['xian']>0){
					refresh_xian();
					$("#xian").val(jsonData['xian']);
				}
				$("#loading").slideUp();
				$("#kehuinfo").slideDown();
			}
	);
	$.ajaxSettings.async = true;
});


refreshtyb();

$.getJSON(
	    '/HK/includes/get_baifangren.php',
	    function(jsonData){
	    	$("#baifangren").html($("#areaDataTemplate").tmpl(jsonData));
	    }
);

$.getJSON(
	    '/HK/includes/get_baifangren.php',
	    function(jsonData){
	    	$("#fuzheren").html($("#areaDataTemplate").tmpl(jsonData));
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
	refresh_sheng();
    $("#shi").html('<option value="-1">请选择城市</option>');
	$("#xian").html('<option value="-1">请选择区县</option>');
});

$("#sheng").change(function(){
    refresh_shi();
	$("#xian").html('<option value="-1">请选择区县</option>');
});

$("#shi").change(function(){
    refresh_xian();
});

function refresh_sheng(){
	$.getJSON(
    	    '/HK/includes/get_province.php',
    	    {areaID:$("#diqu").val()},
    	    function(jsonData){
    	    	$("#sheng").html($("#areaDataTemplate").tmpl(jsonData));
    	    }
	);
}

function refresh_shi(){
	$.getJSON(
    	    '/HK/includes/get_city.php',
    	    {provinceID:$("#sheng").val()},
    	    function(jsonData){
    	    	$("#shi").html($("#areaDataTemplate").tmpl(jsonData));
    	    }
	);
}

function refresh_xian(){
	$.getJSON(
    	    '/HK/includes/get_xian.php',
    	    {cityID:$("#shi").val()},
    	    function(jsonData){
    	    	$("#xian").html($("#areaDataTemplate").tmpl(jsonData));
    	    }
	);
}

$("#addkehu").validate({
	debug:true,
	rules:{
		kehuname:{
			required:true
		},
		telephone:{
			required:true,
			digits:true
		}
	},
	messages:{
		kehuname:{
			required:"*必填项"
		},
		telephone:{
			required:"*必填项",
			digits:"*客户电话必须为数字"
		}
	},
	errorPlacement: function (error, element) {
	    error.appendTo(element.parent());
	},
	submitHandler: function(){
	    modify_kehuinfo();  
	}
});


function refreshtyb(){
	$.getJSON(
		    '/HK/includes/get_tuoyunbu.php',
		    function(jsonData){
		    	$("#tuoyunbu").html($("#areaDataTemplate").tmpl(jsonData));
		    }
	);
}

function addtyb(){
	$("#addtybresult").slideDown("fast");
	$("#tybloading").show();
	$("#tybwrong").hide();
	$("#tybsuccess").hide();
	$("#tybfailed").hide();
	var tybname = $("#tybname").val();
	var tybtelephone = $("#tybtelephone").val();
	var tybaddress = $("#tybaddress").val();
	var tybitem = $("#tybitem").val();
	if(tybname=="" || tybtelephone=="" || tybaddress=="" || tybitem==""){
		$("#tybloading").hide();
		$("#tybwrong").show();
		return;
	}
	if(isNaN(tybtelephone)){
		$("#addtybresult").slideUp("fast");
		alert("电话号码必须为数字！");
		return;
	}
	$.getJSON(
    	    '/HK/includes/add_tuoyunbu.php',
    	    {tybname:tybname,
        	 tybtelephone:tybtelephone,
        	 tybaddress:tybaddress,
        	 tybitem:tybitem
        	},
    	    function(jsonData){
        	    $("#tybloading").hide();
        	    if(jsonData['result'] == 1){
            	    refreshtyb();
            	    $("#tybname").val('');
            	    $("#tybtelephone").val('');
            	    $("#tybaddress").val('');
            	    $("#tybitem").val('');
            	    $("#tybsuccess").show();
        	    }else{
        	    	$("#tybfailed").show();
        	    }
    	    }
	);
}

function modify_kehuinfo(){
	$("#kehuinfo").slideUp("fast");
	$("#loading").slideDown("fast");
	$("#result").hide();
	$.getJSON(
			'/HK/includes/modify_kehuinfo.php',
			{kehuid:$("#kehuid").val(),
			kehuname:$("#kehuname").val(),
			addtime:$("#addtime").val(),
			ename:$("#ename").val(),
			scname:$("#scname").val(),
			scmianji:$("#scmianji").val(),
			address:$("#address").val(),
			telephone:$("#telephone").val(),
			dzname:$("#dzname").val(),
			telephone2:$("#telephone2").val(),
			dztelephone:$("#dztelephone").val(),
			mobile:$("#mobile").val(),
			dzqq:$("#dzqq").val(),
			chuanzheng:$("#chuanzheng").val(),
			dzqita:$("#dzqita").val(),
			pingpai:$("#pingpai").val(),
			pingpailx:$("#pingpailx").val(),
			mianji1:$("#mianji1").val(),
			jzpingpai:$("#jzpingpai").val(),
			chuyangnum:$("#chuyangnum").val(),
			mianji2:$("#mianji2").val(),
			caozuoren:$("#caozuoren").val(),
			pingjia:$("#pingjia").val(),
			tihuoyx:$("#tihuoyx").val(),
			khlaiyuan:$("#khlaiyuan").val(),
			baifangren:$("#baifangren").val(),
			khpj:$("#khpj").val(),
			khtuiguang:$("#khtuiguang").val(),
			jsxz:$("#jsxz").val(),
			zxdangci:$("#zxdangci").val(),
			scxingzhi:$("#scxingzhi").val(),
			diqu:$("#diqu").val(),
			tuoyunbu:$("#tuoyunbu").val(),
			fuzheren:$("#fuzheren").val(),
			sheng:$("#sheng").val(),
			shi:$("#shi").val(),
			xian:$("#xian").val()
			},
			function(jsonData){
				$("#loading").hide();
				if(jsonData['result'] == 1){
					$("#result").html('<p>修改成功！</p>').slideDown("fast");
				}else if(jsonData['result'] == 0){
					$("#result").html('<p>修改失败！</p>'+jsonData['message']).slideDown("fast");
				}else{
					$("#result").html('<p>修改失败！未知错误</p>').slideDown("fast");
				}
			}
	);
}

</script>
<script id="areaDataTemplate" type="text/x-jQuery-tmpl">
	<option value="${dataID}">${dataValue}</option>
</script>
<script id="kehuDataTemplate" type="text/x-jQuery-tmpl">
	<option value="${dataID}">【${dataValue1}】【${dataValue2}】</option>
</script>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . 'HK/includes/foot.html';?>
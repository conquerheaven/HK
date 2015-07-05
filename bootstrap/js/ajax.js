/**
 * 
 */
	var xmlobj;
	var message;
	function CreateXMLHttpRequest(){
		if(window.ActiveXObject){
			xmlobj = new ActiveXObject("Microsoft.XMLHTTP");
		}
		else if(window.XMLHttpRequest){
			xmlobj = new XMLHttpRequest();
		}
	}
	function ReqKehu(){//获取客户下拉菜单
		var kehu = document.getElementById("kehu").value;
		message = "kehu="+kehu;
		if(message == "kehu="){
			hideKehu();
			document.getElementById("History").innerHTML = "";
			return;
		}
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = StarHandlerKehu;
		xmlobj.open("GET","/HK/XiaoShouGuanLi/XiaoShouDan/kehu.php?"+message,true);
		xmlobj.send(null);
	}
	function StarHandlerKehu(){
		if(xmlobj.readyState == 4 && xmlobj.status == 200){
			showKehu();
			document.getElementById("Kehumenu").innerHTML = xmlobj.responseText;
		}
	}
	function ReqPro(){//获取产品下拉菜单
		var Pro = document.getElementById("Pro").value;
		message = "Pro="+Pro;
		if(message == "Pro="){
			hidePro();
			return;
		}
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = StarHandlerPro;
		xmlobj.open("GET","pro.php?"+message,true);
		xmlobj.send(null);
	}
	function StarHandlerPro(){
		if(xmlobj.readyState == 4 && xmlobj.status == 200){
			showPro();
			document.getElementById("Promenu").innerHTML = xmlobj.responseText;
		}
	}
	function setOrder(id,price){
		hidePro();
		message = "id="+id+"&price="+price;
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = StarHandlerOrder;
		xmlobj.open("GET","addPro.php?"+message,true);
		xmlobj.send(null);
	}
	function StarHandlerOrder(){
		if(xmlobj.readyState == 4 && xmlobj.status == 200){
			document.getElementById("Order").innerHTML = xmlobj.responseText;
		}
	}
	function deleteOrder(id){
		message = "id="+id;
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = StarHandlerOrder;
		xmlobj.open("GET","deletePro.php?"+message,true);
		xmlobj.send(null);
	}
	function modifyOrder(id){
		var price = document.getElementById("price"+id).value;
		var num = document.getElementById("num"+id).value;
		var beizhu = document.getElementById("beizhu"+id).value;
		message = "id="+id+"&price="+price+"&num="+num+"&beizhu="+beizhu;
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = StarHandlerOrder;
		xmlobj.open("GET","modifyPro.php?"+message,true);
		xmlobj.send(null);
	}
	function history(id){
		message = "id="+id;
		//alert(id);
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = ShowHistory;
		xmlobj.open("GET","getHistory.php?"+message,true);
		xmlobj.send(null);
	}
	function ShowHistory(){
		//document.getElementById("History").innerHTML = xmlobj.readyState+xmlobj.status;
		if(xmlobj.readyState == 4 && xmlobj.status == 200){
			document.getElementById("History").innerHTML = xmlobj.responseText;
		}
	}
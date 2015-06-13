<?php
require_once $_SERVER['DOCUMENT_ROOT'].'HK/includes/access.inc.php';

if(!userIsLoggedIn()){
	include $_SERVER['DOCUMENT_ROOT'].'HK/includes/login.php';
	include $_SERVER['DOCUMENT_ROOT'].'HK/includes/foot.html';
	exit();
}

if(!userHasRole()){
	$error = '权限不足.';
	include $_SERVER['DOCUMENT_ROOT'].'HK/includes/error.html';
	include $_SERVER['DOCUMENT_ROOT'].'HK/includes/foot.html';
	exit();
}
?>
<html>
<body>

<script type="text/javascript">
var session = "<?php echo $_SESSION['username'];?>";
var str = '<ul class="nav pull-right"><li><a>'+session+'</a></li></ul><ul class="nav pull-right"><li><a href="#" onclick="logout()">退出</a></li></ul>';
$("#nav").html(str);

function logout(){
	$("#logout").submit();
}
</script>
</body>
</html>
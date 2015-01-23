<?php
$pageId = '[0]';

include '/includes/head.html';

require_once '/includes/access.inc.php';

if(!userIsLoggedIn()){
	include '/includes/login.php';
	include '/includes/foot.html';
	exit();
}

if(!userHasRole()){
	$error = '权限不足.';
	include 'error.html';
	include '/includes/foot.html';
	exit();
}

?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<p>欢迎来到豪客！</p>
</body>
</html>
<?php 
include '/includes/foot.html';
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>head</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap-dropdown.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="span12" style="text-align:center">
  <h2>登录</h2>
<?php if(isset($loginError)):?>
<p><?php htmlout($loginError)?></p>
<?php endif;?>
<form action="" method="post">
<div style="text-align:center;">
<input type="text" name="username" id="username" placeholder="用户名"/><br>
<input type="password" name="password" id="password" placeholder="密码"/><br>
<input type="submit" value="登录" class="btn btn-success" contenteditable="true"/><br>
<input type="hidden" name="action" value="login" />

</div>
</form>
</div>
</div>
</div>

</body>
</html>
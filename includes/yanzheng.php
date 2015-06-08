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
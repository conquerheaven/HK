<?php
function userIsLoggedIn(){
	if(isset($_POST['action']) and $_POST['action'] == 'login'){
		if(!isset($_POST['username']) or $_POST['username'] == '' or !isset($_POST['password']) or $_POST['password'] == ''){
			$GLOBALS['loginError'] = '请填写完整！';
			return false;
		}
		$password = md5($_POST['password']);
		if(databaseContainsUser($_POST['username'] , $password)){
			session_start();
			$_SESSION['loggedIn'] = true;
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $password;
			return true;
		}else{
			session_start();
			unset($_SESSION['loggedIn']);
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			$GLOBALS['loginError'] = '用户名或密码错误！';
			return false;
		}
	}
	if(isset($_POST['action']) and $_POST['action'] == 'logout'){
		session_start();
		unset($_SESSION['loggedIn']);
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		header('Location: ' . $_POST['goto']);
	}
	session_start();
	if(isset($_SESSION['loggedIn'])){
		//return true;
		return databaseContainsUser($_SESSION['username'] , $_SESSION['password']);
	}
}

function databaseContainsUser($username , $password){
	include 'db.inc.php';
	
	try {
		$sql = 'SELECT COUNT(*) FROM adminname WHERE UserName = :username AND PassWord = :password';
		$s = $pdo->prepare($sql);
		$s->bindValue(':username',$username);
		$s->bindValue(':password',$password);
		$s->execute();
	} catch (PDOException $e) {
		$error = '数据库错误！';
		include 'error.html';
		exit();
	}
	
	$row = $s->fetch();
	if($row[0] > 0) return true;
	else return false;
}

function userHasRole(){
	if($GLOBALS['pageId'] == '[0]') return true;
	include 'db.inc.php';
	
	try {
		$sql = 'SELECT COUNT(*) FROM adminname WHERE UserName = :username AND PassWord = :password AND Power LIKE :pageId';
		$s = $pdo->prepare($sql);
		$s->bindValue(":username" , $_SESSION['username']);
		$s->bindValue(":password" , $_SESSION['password']);
		$s->bindValue(":pageId" , '%'.$_SESSION['pageId'].'%');
		$s->execute();
	} catch (PDOException $e) {
		$error = '数据库错误！';
		include 'error.html';
		exit();
	}
	
	$row = $s->fetch();
	if($row[0] > 0) return true;
	else return false;
}
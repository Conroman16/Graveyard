<?php

$username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];

if ($username != '') {
	header("Location: homepage.php");
	exit;
}

$action = empty($_POST['action']) ? '' : $_POST['action'];

if ($action == 'do_login') {
	process_login();
}
else {
	login_form();
}

function process_login(){
	$username = empty($_POST['uname']) ? '' : $_POST['uname'];
	$password = empty($_POST['pword']) ? '' : $_POST['pword'];

	if ($username == "test" && $password == "pass") {
		setcookie('username', $username, time()+3600, '/~cjkmt9/expl1/');
		header("Location: homepage.php");
		exit;
	}
	else {
		$error = '<h1 style="color:red">LOGIN FAILED!</h1><h3>The username or password that you entered was incorrect.  Please try again.</h3><br>';
		print $error;
		login_form();
		require("backBtn.php");
	}
}

function login_form(){
	$username = '';
	$password = '';
	require("login_form.php");	
}
?>
<?php
	// A user has to have logged in order to have this 'username' cookie
	$username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];
	
	// If the cookie isn't there, send them back to the login
	if (!$username) {
		header("Location: index.php");
		exit;
	}
?>

<!DOCTYPE html>
<?php 
	session_start(); /// initialize session 
	include("passwords.php"); 
	check_logged(); /// function checks if visitor is logged. 
	if user is not logged the user is redirected to login.php page  
?>
<div class="page-container" id="sample-proj-container">
	<h1 class="page-header" id="sample-proj-header">SAMPLE PROJECTS</h1>
	<div class="page-content cf" id="sample-proj-content">
		<h3>This is some test content</h3>
		<p>Therefore nothing interesting exists here at the moment</p>
	</div>
</div>
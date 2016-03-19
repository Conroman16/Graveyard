<?php
	$username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];
	if ($username != '') {
		header("Location: homepage.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Connor Kennedy</title>
		<link rel="shortcut icon" href="./images/favicon.png"> <!-- Favicon -->
		<link rel="stylesheet" type="text/css" href="css/style.flat.css"> <!-- Coustom stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/clearfix.css"> <!-- Nicholas Gallagher's clearfix hack http://nicolasgallagher.com/micro-clearfix-hack/ -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!-- Bootstrap CSS for page cleanliness -->
		<link rel="stylesheet" type="text/css" href="css/jq-ui/jquery-ui-1.10.4.custom.min.css"> <!-- jQuery UI 1.10.4 CSS -->
		<script type="text/javascript" src="js/jqmin.js"></script> <!-- jQuery 2.1 -->
		<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script> <!-- jQuery UI 1.10.4 JavaScript -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- Bootstrap JS for Modal -->
		<script type="text/javascript" src="js/navigation.js"></script> <!-- AJAX navigation -->
		<script type="text/javascript">
			$(document).ready(function(){
				$(".draggable").draggable();
				menuSnap();
				$("#login-button-wrapper").hover(function(){
					$("#login-button-wrapper #user-icon").css("color", "#FF9B08");
					$("#login-button-wrapper #inner-login-text").css("color" , "#FF9B08");
				}, function(){
					$("#login-button-wrapper #user-icon").css("color" , "#7F8C8D");
					$("#login-button-wrapper #inner-login-text").css("color" , "#7F8C8D");
				});
			});
			function menuSnap(){
				$("#menu-wrapper.draggable").draggable({snap: "#menu-magnet"});
			}
		</script>
	</head>
	<body class="body cf">
		<a href="" data-toggle="modal" data-target="#loginModal">
			<div class="cf" id="login-button-wrapper">
				<div id="user-icon" class="cf glyphicon glyphicon-user"></div>
				<div id="login-text" class="cf">
					<p id="inner-login-text">Login</p>
				</div>
			</div>
		</a>
		<div id="title-container">
			<h1 style="color:#7f8c8d;" id="title">Connor Kennedy</h1>
			<h5 style="color:#7f8c8d;" id="sub-title">I am a motivated, self-starter currently studying Information Technology and Computer Science at the University of Missouri - Columbia.  I work as a Customer Support Representative at Foliotek, Inc.</h5>
		</div>
		<div id="content-area">
			<!-- This is where AJAX will take over and load the page content -->
		</div>
		<!-- MENU v2 -->
		<div clas="draggable" id="menu-magnet"></div>
		<div class="cf draggable" id="menu-wrapper">
			<div id="menu-drag-handle" class="menu-top"><p class="center-text" id="dots"><span id="hellip">&hellip;</span></p></div>
			<a class="def-page" href="#intro"><div class="menu-item menu-top" id="intro"><h4 class="menu-item-text">Introduction</h4></div></a>
			<!--<a href="#aboutme"><div class="menu-item" id="aboutme"><h4 class="menu-item-text">About Me</h4></div></a>-->
			<!--<a href="#edexp"><div class="menu-item" id="edexp"><h4 class="menu-item-text">Education Experience</h4></div></a>-->
			<!--<a href="#itexp"><div class="menu-item" id="itexp"><h4 class="menu-item-text">IT Experience</h4></div></a>-->
			<!--<a href="#volunteerexp"><div class="menu-item" id="volunteerexp"><h4 class="menu-item-text">Volunteer Experience</h4></div></a>-->
			<!--<a href="#nicamissions"><div class="menu-item" id="nicamissions"><h4 class="menu-item-text">Nicaragua Missions</h4></div></a>-->
			<!--<a href="#workexp"><div class="menu-item" id="workexp"><h4 class="menu-item-text">Work Experience</h4></div></a>-->
			<!--<a href="#sample_projects"><div class="menu-item" id="sample_projects"><h4 class="menu-item-text">Sample Projects</h4></div></a>-->
			<!--<a href="#feedback"><div class="menu-item" id="feedback"><h4 class="menu-item-text">Feedback</h4></div></a>-->
			<a href="#weather"><div class="menu-item" id="weather"><h4 class="menu-item-text">Weather</h4></div></a>
			<a href="#video"><div class="menu-item menu-bottom" id="video-page"><h4 class="menu-item-text">Videos</h4></div></a>
		</div>
		<!--<div id="page-footer">
			<h3 class="center-text">&copy; 2014 Connor Kennedy</h3>
		</div>
		<!-- Login Modal -->
		<div class="modal fade" id="loginModal" role="dialog" aria-hidden="true">
			<div class="modal-dialog draggable">
			    <div id="loginModal-header" class="modal-header">
			    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 style="color:#7f8c8d;">LOGIN</h4>
			    </div>
			    <div id="loginModal-body" class="modal-body cf">
			    	<?php
			    		require('login.php');
					?>
			    </div>
			</div>
		</div>
	</body>
</html>
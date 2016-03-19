<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/style.flat.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body>
		<form id="login-form" action="login.php" method="POST">
			<input type="hidden" name="action" value="do_login">
			<div class="input-wrapper" id="username-wrapper"><label for="uname">Username:</label><input type="text" id="username" name="uname" autofocus></div><br>
			<div class="input-wrapper" id="password-wrapper"><label for="pword">Password:</label><input type="password" id="password" name="pword"></div><br>
			<input class="btn btn-primary" id="login-button" type="submit" name="submit" value="Login">
		</form>
	</body>
</html>
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
<script type="text/javascript" src="js/feedback.js"></script> <!-- Feedback from validation -->
<div class="page-container" id="feedback-container">
	<h1 class="page-header" id="feedback-header">FEEDBACK</h1>
	<div class="page-content" id="feedback-content">
		<div class="form-container">
			<div id="errorNotice"><p>There were errors in your submission.<br>Please correct them and submit again.</p></div>
			<form class="form cf" id="feedback-form" action="processFeedback.php" method="POST">
				<label for="fullName">Your Name:</label><input id="fullName" type="text" name="fullName" placeholder="Full Name"><br>
				<label for="emailAddress">Your Email:</label><input id="emailAddress" type="text" name="emailAddress" placeholder="Email Address"><br>
				<label for="message">Your Feedback:</label><textarea id="message" name="message" placeholder="Comments, Questions, Concerns, etc."></textarea><br>
				<input id="feedback-submitBtn" type="submit" value="Submit">
			</form>
		</div>
	</div>
</div>
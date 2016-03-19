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
<div class="page-container" id="about-me-container">
	<h1 class="page-header" id="about-me-header">ABOUT ME</h1>
	<div class="page-content indent-1-5em cf" id="about-me-content">
		<p>My name is Connor Kennedy and I am from Springfield, Missouri.  I am a 21-year-old student who is currently enrolled in the University of Missouri - Columbia.  I am beginning my junior year studying Information Technology.  By day, I am a Customer Support Representative for Foliotek, Inc., and by night I am an avid disc-golf enthusiast.  Some of my other hobbies include computer programming, tinkering with computers (hardware, software, and networking), amateur photography, spending time outdoors, listening to music, and reading on the internet.  My life philosophy is to live life to its fullest, capitalize on opportunities, and never lose sight of the things that are truly important.  If I had only one piece of advice to give, it would be to never underestimate the power of a smile.  They are contagious and can mean the difference between a bad day and a good day, for yourself and others.  This life is a constant process of self-betterment, so I try to never get so caught-up in things that I lose sight of the big picture, and what it really means to be a well-rounded individual.</p>
		<img id="my-photo" src="./images/me.jpg" alt="BS IT | Minor CS">
	</div>
</div>
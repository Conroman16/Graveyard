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
<script>
	$(function(){
		$(".accordion").accordion();
	});
</script>
<div class="page-container" id="ed-exp-container">
	<h1 class="page-header" id="ed-exp-header">EDUCATION EXPERIENCE</h1>
	<div class="page-content accordion" id="ed-exp-content">
		<h4 id="higher-ed-header" >Higher Education</h4>
		<div class="page-entry">
			<div class="sub-info cf">
				<!--<h4 class="sub-title">Aug 2011 - Present</h4>-->
				<a href="//missouri.edu/" target="_blank"><img class="sub-image" src="./images/mu_logo.png" alt="MU"></a>
				<div class="sub-text">
					<h4>University of Missouri</h4>
					<h5>August 2011 - Present</h5>
					<h5><a href="//engineering.missouri.edu/cs/degree-programs/bs-it/" target="_blank">BS - Information Technology</a> | <a href="//engineering.missouri.edu/academic-departments/majors-minors-degree-programs/minor-in-computer-science/" target="_blank">Minor - Computer Science</h5>
					<h5><a href="//www.gocolumbiamo.com/" target="_blank">Columbia, Missouri</a></h5>
				</div>
			</div>
			<ul class="entry-list" id="mu-topics">
				<li class="indent-1em">I am currently in my third year at the University of Missouri working toward a Bachelor's of Science in Information Technology and a minor in Computer Science.  My favorite subjects are the ones dealing with computers.  My most favorite class series I have taken at MU, and the one I've learned the most in is Audio/Video I & II.  In this two-part class we were responsible for collecting and processing multimedia in Adobe Creative Suite 6 and Creative Cloud into videos to prove editing proficiency.  The classes focused more upon building quality editing abilities and less upon gathering flawless footage, because we were told that the worse the footage is, the greater the challenge it bestows on the editor.</li>
				<li class="indent-1em">My other focus in the IT program is computer programming and algorithm design.  I have programmed a few small command-line games and various other basic programs that calculate interest on loans, modify files, sort data, build abstract data types, etc.  I enjoy programming because of the behind-the-scenes nature of it.  It is thrilling for me to be able to instruct the computer on a very basic, step-by-step level how to perform tasks and functions to reach a greater goal or end product.  Some samples of my programming can be found on my Code Samples page.</li>
			</ul>
		</div>
		<h4 id="secondary-ed-header">Secondary Education</h4>
		<div class="page-entry">
			<div class="sub-info cf">
				<!--<h4 class="sub-title">Aug 2007 - May 2011</h4>-->
				<a href="//glendale.spsk12.org/" target="_blank"><img class="sub-image" src="./images/gdale_logo.png" alt="GHS"></a>
				<div class="sub-text">
					<h4>Glendale High School</h4>
					<h5>August 2007 - May 2011</h5>
					<h5><a href="//www.springfieldmo.gov/home/home.jsp" target="_blank">Springfield, Missouri</a></h5>
				</div>
			</div>
			<ul class="entry-list" id="hs-topics">
				<li class="indent-1em">In high school, I participated in a program called Project Lead The Way.  This program is a pre-engineering program that was being tested out in a select few of high schools around the state of Missouri, one of which being mine.  I joined the program as soon as it became officially offered for scheduling.  I was able to take two classes before graduating, one being Principles of Engineering, which included concepts and hands-on experience in architectural, structural, mechanical, and industrial engineering; the other was Digital Electronics, which offered hands-on experience in microprocessor circuit design and implementation.  Aside from the knowledge and experience in engineering and circuit design, the most valuable aspect that I took from the Project Lead The Way program was the ability to collaborate with a team to achieve a common goal.</li>
				<li class="indent-1em">During the last two and a half years of my high school career I took Spanish 1 through 5, which covered everything up to a conversational or intermediate level.  This was very beneficial to me when I went on missions to Nicaragua.</li>
			</ul>
		</div>
	</div>
</div>
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
<div class="page-container" id="vol-exp-container">
	<h1 class="page-header" id="vol-exp-header">VOLUNTEER EXPERIENCE</h1>
	<div class="page-content accordion" id="vol-exp-content">
		<h4>Fellowship Bible Church</h4>
		<div class="page-entry">
			<div class="sub-info cf">
				<h4 class="sub-title">Aug 2007 - May 2011</h4>
				<a href="//fbclife.org/" target="_blank"><img id="fbc-logo" src="./images/fbc_logo.png" alt="FBC"></a>
				<div class="sub-text">
					<h4>Technical Director of Student Ministries</h4>
					<a href="//fbclife.org/" target="_blank">Fellowship Bible Church</a>
					<h5><a href="//www.rogersvillemo.org/" target="_blank">Rogersville, Missouri</a></h5>
				</div>
			</div>
			<ul class="entry-list" id="fbc-topics">
				<li class="indent-1em">My duties as Technical Director of Student Ministries were to oversee the planning and execution of two services every Sunday.  I would program sound, lighting, and multimedia, such as worship lyrics and teaching PowerPoints every week prior to service.</li>
				<li class="indent-1em">Every Sunday morning I would arrive about an hour early to get the system set up.  I would turn all the equipment on, set a pre-mix for the sound, turn on and aim the correct stage lights, and start the worship system by turning on all the screens, starting the EasyWorship program, and starting the worship presentation.  Once the system was on-line, the band would come on stage and rehearse a song or two so that I could finish mixing the audio.  After that was done, we would open the doors and start the first service.  This would be repeated for two services.  Then I was responsible for shutting down the system and prepping it for the next usage.</li>
				<li class="indent-1em">Towards the beginning of my time at Fellowship Bible Church, we moved into the old main sanctuary when the church built a new one. Upon moving, I and a couple other volunteers, completely rewired and adapted the old sound and lighting systems to accommodate our new systems of intelligent lighting and audio amplification. I regard this as my most valuable experience in this job, because I learned an incredible amount about how to design and implement such an extensive electronic system.</li>
			</ul>
		</div>
		<h4>Project H.O.P.E.</h4>
		<div class="page-entry">
			<div class="sub-info cf">
				<h4 class="sub-title">July 2009 - Oct 2009</h4>
				<a href="//www.pjhope.org/" target="_blank"><img id="pjhope-logo" src="./images/pj_hope_logo.png" alt="Project H.O.P.E."></a>
				<div class="sub-text">
					<h4>Administrative Assistant / Secretary</h4>
					<a href="//www.pjhope.org/" target="_blank">Project H.O.P.E.</a>
					<h5><a href="//www.springfieldmo.gov/home/home.jsp" target="_blank">Springfield, Missouri</a></h5>
				</div>
			</div>
			<ul class="entry-list" id="pjhope-topics">
				<li class="indent-1em">In high school, I participated in a program called <a href="//www.pltw.org/" target="_blank">Project Lead The Way</a>.  This program is a pre-engineering program that was being tested out in a select few of high schools around the state of Missouri, one of which being mine.  I joined the program as soon as it became officially offered for scheduling.  I was able to take two classes before graduating, one being Principles of Engineering, which included concepts and hands-on experience in architectural, structural, mechanical, and industrial engineering; the other was Digital Electronics, which offered hands-on experience in microprocessor circuit design and implementation.  Aside from the knowledge and experience in engineering and circuit design, the most valuable aspect that I took from the Project Lead The Way program was the ability to collaborate with a team to achieve a common goal.</li>
				<li class="indent-1em">During the last two and a half years of my high school career I took Spanish 1 through 5, which covered everything up to a conversational or intermediate level.  This was very beneficial to me when I went on missions to Nicaragua.</li>
			</ul>
		</div>
	</div>
</div>
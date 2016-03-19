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
<div class="page-container" id="work-exp-container">
	<h1 class="page-header" id="work-exp-header">WORK EXPERIENCE</h1>
	<div class="page-content accordion" id="work-exp-content">
		<h4>May 2013 - Present</h4>
		<div class="page-entry">
			<div class="sub-info cf">
				<!--<h4 class="sub-title">May 2013 - Present</h4>-->
				<a href="//www.foliotek.com/" target="_blank"><img id="ft-logo" src="./images/foliotek_logo.png" alt="Foliotek, Inc."></a>
				<div class="sub-text">
					<h4>Customer Support Representative</h4>
					<a href="//www.foliotek.com/" target="_blank">Foliotek, Inc.</a>
					<h5><a href="//www.gocolumbiamo.com/" target="_blank">Columbia, Missouri</a></h5>
				</div>
			</div>
			<ul class="entry-list" id="ft-topics">
				<li class="indent-1em">My duties working for Foliotek are to provide customers support and aid in the smooth usage of the Foliotek system.</li>
			</ul>
		</div>
		<h4>June 2011 - August 2012</h4>
		<div class="page-entry">
			<div class="sub-info cf">
				<!--<h4 class="sub-title">Aug 2011 - Aug 2012</h4>-->
				<a href="//www.staffingplusspringfield.com/" target="_blank"><img id="sp-logo" src="./images/staffingplus_logo.png" alt="StaffingPlus"></a>
				<div class="sub-text">
					<h4>Server / Temporary Labor</h4>
					<a href="//www.staffingplusspringfield.com/" target="_blank">StaffingPlus</a>
					<h5><a href="//www.springfieldmo.gov/home/home.jsp" target="_blank">Springfield, Missouri</a></h5>
				</div>
			</div>
			<ul class="entry-list" id="sp-topics">
				<li class="indent-1em">My duties working for StaffingPlus are to represent the company to the best of my ability by working hard, being a team player, and promoting synergy across the broad spectrum of working environments we enter into.</li>
				<li class="indent-1em">A majority of my time at StaffingPlus was spent setting up, serving, and tearing down banquets at <a href="//www.upspringfield.com/" target="_blank">University Plaza Hotel</a> and <a href="//www.ramadaoasis.com/" target="_blank">Ramada Oasis Inn and Convention Center</a> (both located in Springfield, MO).</li>
			</ul>
		</div>
	</div>
</div>
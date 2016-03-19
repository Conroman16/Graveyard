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
	$(document).ready(function(){
		$(".draggable").draggable();
	});
</script>
<div class="page-container" id="nica-missions-container">
	<h1 class="page-header" id="nica-missions-header">NICARAGUA MISSIONS</h1>
	<div class="page-content" id="nica-missions-content">
		<p class="center-text">I have been on two mission trips to the Central American country of Nicaragua with a mission organization called <a href="//www.pjhope.org/" target="_blank">Project H.O.P.E.</a>  On these mission trips my team and I provided basic needs such as food, water, and shelter to native Nicaraguans that did not have access to such things.  We dug water lines, built houses, and shared the good news of faith with the impoverished Nicaraguans who were desperately in need.</p>
		<div class="cf" id="nica-maps-images">
			<img class="draggable cf" id="img1" src="./images/nica_close-both_marked_400x400.jpg" alt="Nicaragua Map">
			<img class="draggable cf" id="img2" src="./images/americas_wide-nicaragua_marked_400x400.jpg" alt="Nicaragua Map 2">
		</div>
		<div class="page-entry center-text" id="lp-2008">
			<h2>2008 Mission to Las Penitas, León, Nicaragua</h2>
			<div class="iframe-container">
				<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15649.857338256434!2d-87.02515429999997!3d12.366800200000009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f70dcf9adbaec49%3A0x5001a744db16ac1d!2sLas+Penitas!5e1!3m2!1sen!2sus!4v1396540295075" frameborder="0"></iframe>
			</div>
			<p>In 2008, I went on my first mission trip to Nicaragua with <a href="//www.pjhope.org/" target="_blank">Project H.O.P.E.</a>  The purpose of this trip was to dig a water line to supply potable water to a village that could not successfully drill a salt-water-free well.  Instead, the villagers had to carry buckets of potable water about 1.5 miles from a nearby restaurant to their homes.  Our team was responsible for digging trenches for the water lines that came from a new, further inland well.  Each individual or family on the trip was assigned a native Nicaraguan family from the village to provide with a care package of basic essentials and supplies.  We spent seven full days, not including travel, in Nicaragua.  For five of those days we were at the work site digging and interacting with the locals.  I had many wonderful experiences in that short five-day span, but none more wonderful than seeing how excited and thankful the local Nicaraguans were for our work.  It was truly one of the most life-changing events I have ever been through.</p>
			<h3 id="nica-ss-vid-header">Slideshow Video</h3>
			<p>Upon returning to the United States, I was asked by a few members of my team and by the <a href="//www.pjhope.org/" target="_blank">Project H.O.P.E.</a> president, Kim Bradley, to put together a slideshow of all the pictures that were taken on the trip by myself and others.  I did so without hesitation.  The video was played during service at <a href="//fbclife.org/" target="_blank">Fellowship Bible Church</a> one Sunday morning, and was also included on the <a href="//www.pjhope.org/" target="_blank">Project H.O.P.E.</a> website for a short time.</p>
		</div>
		<div class="page-entry center-text" id="bdx-2009">
			<h2>2009 Mission to Bosques de Xiloá, Nicaragua</h2>
			<div class="iframe-container">
				<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7829.565721129605!2d-86.31569640000001!3d12.21097655000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f71576a452f28bf%3A0x70071de9a2e354b6!2sBosques+de+Xiloa!5e1!3m2!1sen!2sus!4v1396542848010" frameborder="0"></iframe>
			</div>
			<p>In 2009, I went on a mission to Bosques de Xiloá, Managua, Nicaragua.  The purpose of this mission was to build houses for people who lived in small shacks hacked together from driftwood and scrap metal.  On this trip, I was part of the framing crew.  Our duties were to go to the houses that had already had the foundation poured and erect the skeleton structure of a 10' x 15' house.  My crew and I framed in about twenty-five houses in the five days we spent at the work site.  This trip was quite different than the previous trip, because instead of supplying water to houses that Project H.O.P.E. had already built, we were building the houses.  On the previous trip, the native Nicaraguans were delighted to have our team bring potable water to their houses, but on this trip, the natives were ecstatic that we were providing them with a real, structurally-sound, house.  I have never seen anyone be as thankful and gracious as the locals in Bosques de Xiloá were that week.  This had a profound effect on my life philosophy, because I saw what true poverty is, and how wonderful we have it in the United States.  It brought me to the realization that material possessions are worthless, and the only thing that truly matters is what you can do for the greater good of all.</p>
		</div>
		<div class="page-footerimage-container">
			<a href="//www.pjhope.org/" target="_blank"><img src="./images/pj_hope_logo.png" alt="Project H.O.P.E."></a>
		</div>
	</div>
</div>
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
	<h1 class="page-header" id="ed-exp-header">INFORMATION TECHNOLOGY EXPERIENCE</h1>
	<div class="page-content accordion" id="ed-exp-content">
		<h4>Windows Server</h4>
		<div class="page-entry">
			<div class="sub-info cf">
				<a href="//www.microsoft.com/en-us/server-cloud/products/windows-server-2012-r2/#fbid=yzSiOEzm-4_" target="_blank"><img class="sub-image" src="./images/windows_server_logo.png"></a>
				<div class="sub-text">
					<h4>Windows Server</h4>
					<h5 class="underline">Versions</h5>
					<ul>
						<li>2008 R2</li>
						<li>2012</li>
						<li>2012 R2</li>
					</ul>
				</div>
			</div>
			<ul class="entry-list" id="it-topics">
				<li class="indent-1em">I can set-up, configure, deploy, and maintain most of the Windows Server system such as Hyper-V, Active Directory, Internet Information Services, DNS, Remote Access, File and Storage Services, etc.</li>
			</ul>
		</div>
	</div>
</div>
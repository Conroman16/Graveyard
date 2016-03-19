<?php
	$page = $_POST['page'];
	if (file_exists($page . '.php')){
		echo file_get_contents($page . '.php');
	}
	else{
		echo '<br><br><br><br>The requested page cannot be found on the server!';
	}
?>
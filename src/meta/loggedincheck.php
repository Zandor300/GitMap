<?php

	SESSION_START();
	if((!isset($_SESSION['signed_in'])) && ($_SESSION['signed_in'] == false)) {
		header('Location: http://play.zsinfo.nl/wt/login.php');
	}

?>
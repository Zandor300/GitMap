<?php
	$server = "192.168.1.106";
	$username = "git";
	$password = "git";
	$database = "gitmap";

	$connection = mysqli_connect($server, $username,  $password, $database);

	if(!$connection) {
	    exit('Error: could not establish database connection: ' . mysqli_error($connection));
	} else if(isset($_GET['debug'])) {
		echo('Connection to database is established!<br>');
	}
?>
<?php
	if(!isset($_SESSION))
		session_start();

	if(!(isset($_GET['debug']) && $_GET['debug'] == "1")) {
		error_reporting(0);
		@ini_set('display_errors', 0);
	}

	include_once 'meta/connect.php';

	function getConfig($key) {
		global $connection;
		$sql = "SELECT * FROM config WHERE `key`='".mysqli_real_escape_string($connection, $key)."';";
		$result = mysqli_query($connection, $sql);
		if ($result == false)
			exit('Error code config <br>'.mysql_error());
		$row = mysqli_fetch_assoc($result);
		return $row['value'];
	}


	function nlDate($parameters){

		// AM of PM doen we niet aan
		$parameters = str_replace("A", "", $parameters);
		$parameters = str_replace("a", "", $parameters);

		$datum = date("d F Y", strtotime($parameters));

		/* Vervang de maand, klein
		$datum = str_replace("january", "januari", $datum);
		$datum = str_replace("february", "februari", $datum);
		$datum = str_replace("march", "maart", $datum);
		$datum = str_replace("april", "april", $datum);
		$datum = str_replace("may", "mei", $datum);
		$datum = str_replace("june", "juni", $datum);
		$datum = str_replace("july", "juli", $datum);
		$datum = str_replace("august", "augustus", $datum);
		$datum = str_replace("september", "september", $datum);
		$datum = str_replace("october", "oktober", $datum);
		$datum = str_replace("november", "november", $datum);
		$datum = str_replace("december", "december", $datum);*/


		// Vervang de maand, hoofdletters
		$datum = str_replace("January", "januari", $datum);
		$datum = str_replace("February", "februari", $datum);
		$datum = str_replace("March", "maart", $datum);
		$datum = str_replace("April", "april", $datum);
		$datum = str_replace("May", "mei", $datum);
		$datum = str_replace("June", "juni", $datum);
		$datum = str_replace("July", "juli", $datum);
		$datum = str_replace("August", "augustus", $datum);
		$datum = str_replace("September", "september", $datum);
		$datum = str_replace("October", "oktober", $datum);
		$datum = str_replace("November", "november", $datum);
		$datum = str_replace("December", "december", $datum);

		// Vervang de dag, klein
		$datum = str_replace("monday", "maandag", $datum);
		$datum = str_replace("tuesday", "dinsdag", $datum);
		$datum = str_replace("wednesday", "woensdag", $datum);
		$datum = str_replace("thursday", "donderdag", $datum);
		$datum = str_replace("friday", "vrijdag", $datum);
		$datum = str_replace("saturday", "zaterdag", $datum);
		$datum = str_replace("sunday", "zondag", $datum);

		return $datum;
	}

	function getLnt($zip){
		$url = "http://maps.googleapis.com/maps/api/geocode/json?address=
		".urlencode($zip)."&sensor=false";
		$result_string = file_get_contents($url);
		$result = json_decode($result_string, true);
		$result1[]=$result['results'][0];
		$result2[]=$result1[0]['geometry'];
		$result3[]=$result2[0]['location'];
		return $result3[0];
	}

	function getDistance($zip1, $zip2){
		$unit = 'K';
		$first_lat = getLnt($zip1);
		$next_lat = getLnt($zip2);
		$lat1 = $first_lat['lat'];
		$lon1 = $first_lat['lng'];
		$lat2 = $next_lat['lat'];
		$lon2 = $next_lat['lng']; 
		$theta=$lon1-$lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
		cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
		cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit =="N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}

echo "hi";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GitMap</title>

		<link rel="icon" type="image/png" href="img/logo-black.png">

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<?php //<link rel="stylesheet" href="css/bootstrap-override.css"> ?>
		<?php include_once ('css/bootstrap-override.php'); ?>
		<?php //<link rel="stylesheet" href="css/scrolling-nav.css"> ?>
		<link rel="stylesheet" href="css/bootstrap-navbarhover.css">

		<!--<script type='text/javascript'>
			function() {
			    $('[rel="tooltip"]').tooltip({'placement': 'top'});
			}
		</script>-->

		<!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
		<script src="js/bootstrap.js"></script>
		<script src="js/scrolling-nav.js"></script>
		<script src="js/modal.js"></script>
		<script src="js/tab.js"></script>

	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		  	<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php" style="padding-top:10px; color:white;"><img src="img/logo-white.png" height="30" style="vertical-align:middle;"> GitMap</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="<?php if($page == "index") { echo 'active'; } ?>"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li class="<?php if($page == "profile") { echo 'active'; } ?>"><a href="user">gg</a></li>
					</ul>
				</div>
		  </div>
		</nav>
		<div id="wrapper">
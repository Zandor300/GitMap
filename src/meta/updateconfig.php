<?php
include_once 'loggedincheck.php';

include_once('connect.php');

function error() {
	echo('Error... Probeer het later nog eens. <a href="http://play.zsinfo.nl/wt/admin.php?page=general">Ga terug</a>');
	echo('De error bestaat uit: ' . mysql_error());
	die();
}

$sql = "UPDATE config SET value='". mysql_real_escape_string($_POST['sitename']) ."' WHERE `key`='sitename';";
$result = mysql_query($sql);
if(!$result) { error(); }

$sql = "UPDATE config SET value='". mysql_real_escape_string($_POST['slogan']) ."' WHERE `key`='slogan';";
$result = mysql_query($sql);
if(!$result) { error(); }

$sql = "UPDATE config SET value='". mysql_real_escape_string($_POST['color']) ."' WHERE `key`='color';";
$result = mysql_query($sql);
if(!$result) { error(); }

$sql = "UPDATE config SET value='". mysql_real_escape_string($_POST['root']) ."' WHERE `key`='root';";
$result = mysql_query($sql);
if(!$result) { error(); }

header('Location: http://play.zsinfo.nl/wt/admin.php?page=general&success=1');

?>
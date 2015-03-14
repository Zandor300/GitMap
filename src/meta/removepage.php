<?php
include_once 'loggedincheck.php';

include_once('connect.php');

$sql = "DELETE FROM pages WHERE id=". $_GET['id'] .";";
$result = mysql_query($sql);
if(!$result) {
	echo('Error... Probeer het later nog eens. <a href="http://play.zsinfo.nl/wt/admin.php?page=pages">Ga terug</a>');
	echo('De error bestaat uit: ' . mysql_error());
	die();
}

header('Location: http://play.zsinfo.nl/wt/admin.php?page=pages&success=1');

?>
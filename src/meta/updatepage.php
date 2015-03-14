<?php
include_once 'loggedincheck.php';

include_once('connect.php');

$sql = "UPDATE pages SET name='". mysql_real_escape_string($_POST['title']) ."', content='". mysql_real_escape_string($_POST['content']) ."', date=NOW(), url='". mysql_real_escape_string($_POST['url']) ."' WHERE id=". $_GET['id'] .";";
$result = mysql_query($sql);
if(!$result) {
	echo('Error... Probeer het later nog eens. <a href="http://play.zsinfo.nl/wt/editpage.php?id='. $_GET['id'] .'">Ga terug</a>');
	echo('De error bestaat uit: ' . mysql_error());
	die();
}

header('Location: http://play.zsinfo.nl/wt/editpage.php?id='. $_GET['id'] .'&success=1');

?>
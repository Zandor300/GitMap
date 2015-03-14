<?php
include_once 'loggedincheck.php';

SESSION_START();

include_once('connect.php');

$sql = "INSERT INTO sidebar (name, content, author, `date`) VALUES ('". mysql_real_escape_string($_POST['title']) ."', '". mysql_real_escape_string($_POST['content']) ."', '". mysql_real_escape_string($_SESSION['id']) ."', NOW());";
$result = mysql_query($sql);
if(!$result) {
	echo('Error... Probeer het later nog eens. <a href="http://play.zsinfo.nl/wt/newsidebar.php">Ga terug</a>');
	echo('De error bestaat uit: ' . mysql_error());
	die();
}

header('Location: http://play.zsinfo.nl/wt/editsidebar.php?id='. mysql_insert_id() .'&success=1');

?>
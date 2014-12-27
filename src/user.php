<?php
	include_once 'meta/connect.php';

	if (isset($_SERVER['REDIRECT_URL'])) {
		$parts = explode('/', $_SERVER['REDIRECT_URL']);
		array_shift($parts);
		$url_name = $parts[1];
		$query = "SELECT id FROM users WHERE username='".$url_name."';";
		$result = mysql_query($query);
		$data = mysql_fetch_array($result);
		$_GET['id'] = $data['id'];
	}
	$id = $_GET['id'];

	$sql = "SELECT * FROM pages WHERE id='".$id."';";
	$result = mysql_query($sql);
	if ($result == false)
		exit('Error code pages <br>');
	$row = mysql_fetch_assoc($result);

	$page = "user";
	$user = $row['username'];

	$page="index";
	include_once 'template/head.php';
?>

<br><br>
<div class="jumbotron jumbotron-page">
	<div class="container">
		<h1><?php $row['username'] ?></h1>
	</div>
</div>

<div class="container content">
	<div class="row">

		<div class="col-md-9">
			<p>Content</p>
		</div>

		<div class="col-md-3">
			<?php include_once 'template/sidebar.php'; ?>
		</div>

	</div>
</div>

<?php
	include_once 'template/footer.php';
?>
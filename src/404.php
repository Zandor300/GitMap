<?php
	$page="404";
	include_once 'template/head.php';
?>

<br><br>
<div class="jumbotron jumbotron-page">
	<div class="container">
		<h1>404 Not Found</h1>
		<p>The page you tried to access is currently not available.</p>
	</div>
</div>

<div class="container content">
	<h2>Suggestions</h2>
	<li><a href="<?php echo getConfig('root'); ?>index.php">Back to home.</a></li>
</div>

<?php
	include_once 'template/footer.php';
?>
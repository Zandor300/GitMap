<?php
	$page="index";
	include_once 'template/head.php';

	//$creationsql = "SELECT * FROM creations ORDER BY CONVERT(id, UNSIGNED INTEGER) DESC;";
	//$creationresult = mysql_query($creationsql);
	//if ($creationresult == false)
	//	exit('Error code creation <br>');
?>

<br><br>
<div class="jumbotron">
	<div class="container">
		<img src="img/logo-black.png" height="64"> <h1>GitMap</h1>
		<p>The most awesome GitHub alternative ever!</p>
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
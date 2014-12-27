<?php
	$page="index";
	include_once 'template/head.php';

	//$creationsql = "SELECT * FROM creations ORDER BY CONVERT(id, UNSIGNED INTEGER) DESC;";
	//$creationresult = mysql_query($creationsql);
	//if ($creationresult == false)
	//	exit('Error code creation <br>');
?>

<script>
	$(document).ready(function() {
		$('.jumbotron').scrollDown();
	});
</script>

<br><br>
<div class="jumbotron" style="background: url('img/samen.jpg') no-repeat; background-size: 100%; color:white;">
	<div class="container" style="text-align: center;"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<img src="img/logo.png" width="50%">
	</div>
</div>

<!--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height:742px">
	
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="img/samen.jpg" height="742px">
			<div class="carousel-caption">
				<img src="img/logo.png" width="75%">
			</div>
		</div>
	</div>
</div> -->

<div class="container content">
	<div class="row">

		<div class="col-md-9">
			<h2>Laatste nieuws</h2>
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Nieuws titel komt hier</h4></div>
				<div class="panel-body">
					Nieuws berichtje komt hier
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<?php include_once 'template/sidebar.php'; ?>
		</div>

	</div>
</div>

<?php
	include_once 'template/footer.php';
?>
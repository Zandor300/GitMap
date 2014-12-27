<?php
	session_destroy();

	$page="logout";
	include_once 'template/head.php';
?>

<script>
	$(document).ready(function() {
		$('.jumbotron').scrollDown();
	});
</script>

<br><br>
<div class="container content">
	<div class="row">

		<div class="col-md-9">
			<p>You have been logged out.</p>
		</div>

		<div class="col-md-3">
			<?php include_once 'template/sidebar.php'; ?>
		</div>

	</div>
</div>

<?php
include_once 'template/footer.php';
?>
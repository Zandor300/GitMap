		<br><br><br>
		</div></div>
		<nav class="navbar navbar-default navbar-footer navbar-static-top" role="navigation">
		  <div class="container">
		    <!-- Collect the nav links, forms, and other content for toggling -->
		      <ul class="nav navbar-nav navbar-left">
		        <?php if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']) { ?>
		        	<?php
		        		if($_SESSION['fullname'] != "") {
		        			$name = $_SESSION['fullname'];
		        		} else {
		        			$name = $_SESSION['username'];
		        		}
		        	?>
		        	<li><a href="admin.php">Welkom <?php echo $name; ?></a></li>
		        	<li <?php if($page == "admin") { echo 'class="active"'; } ?>><a href="admin.php">Admin panel</a></li>
		        	<li <?php if($page == "logout") { echo 'class="active"'; } ?>><a href="logout.php">Logout</a></li>
		        <?php } else { ?>
		        	<li <?php if($page == "login") { echo 'class="active"'; } ?>><a href="login.php">Login</a></li>
		        <?php } ?>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<li><a href="http://zsinfo.nl">Copyright © 2014 GitWeb. All rights reserved. Developed by Zandor Smith</a></li>
		      </ul>
		  </div><!-- /.container-fluid -->
		</nav>
	</body>
</html>

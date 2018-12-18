<?php
//define page title
$title = 'Reset Account';

//include header template
require('layout/header.php');
?>

<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Reset Password</h2>
				<p><a href="login.php">Back to login page</a></p>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="" tabindex="1">
				</div>

				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Sent Reset Link" class="btn btn-primary btn-block btn-lg" tabindex="2"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
//include header template
require('layout/footer.php');
?>

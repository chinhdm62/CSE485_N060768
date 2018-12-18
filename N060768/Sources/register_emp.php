<?php
//include header template
require('layout/header.php');
?>

<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="register.php" autocomplete="on">
				<h2>Please Sign Up</h2>
                <p>Already a member?<a href="login.php"> (-Login-)</a></p>
				<hr>
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="" tabindex="1" required autofocus>
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="" tabindex="2" required>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3" required>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4" required>
						</div>
					</div>
				</div>
                <div class="form-group">
					<input type="text" name="" id="" class="form-control input-lg" placeholder="Người liên hệ" value="" tabindex="5" required>
				</div>
                <div class="form-group">
					<input type="text" name="" id="" class="form-control input-lg" placeholder="Quốc gia" value="" tabindex="6" required>
				</div>
                <div class="form-group">
					<input type="text" name="" id="" class="form-control input-lg" placeholder="Địa chỉ" value="" tabindex="7" required>
				</div>
                <div class="form-group">
					<input type="text" name="" id="" class="form-control input-lg" placeholder="Số điện thoại" value="" tabindex="8" required>
				</div>
                <div class="form-group">
                    <textarea class="form-control input-lg" name="comment" rows="5" placeholder="Mô tả công ty" tabindex="9" required></textarea>
				</div>
                <div class="form-group">
                    <input type="text" name="" id="" class="form-control input-lg" placeholder="Ngày thành lập (dddd/mmmm/yyyy)" value="" tabindex="10" required>
				</div>
                <div class="form-group">
                    <input type="text" name="" id="" class="form-control input-lg" placeholder="Tên công ty" value="" tabindex="11" required>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-12"><input type="submit" name="register" value="Register" class="btn btn-primary btn-block btn-lg" tabindex=""></div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
//include header template
require('layout/footer.php');
?>
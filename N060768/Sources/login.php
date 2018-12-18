<?php
session_start();
include("config.php");

if (isset($_COOKIE["mail"])) {
    echo "<script>alert('Tai khoan da duoc kich hoat');</script>";
    setcookie("mail", "mail", time()-1);
}


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * from users where username='$username'";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
    if ($result) {
        if (mysqli_num_rows($result) == 1)  {
			$data = mysqli_fetch_assoc($result);
			$_SESSION["level"] = $data["level"];
			if ($_SESSION["level"] == 2 && $password == $data["password"]) {
				header("location:admin/admin.php");
                exit();
			} else if (password_verify($password, $data["password"])) {
				$_SESSION["username"] = $username;
				header("location:index.php");
                exit();
			}
        }   
    }
}

require('layout/header.php'); 
?>
	
<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="login.php" autocomplete="on">
				<h2>Please Login</h2>
				<p><a href='./'>Back to home page</a></p>
				<hr>
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="UserName" value="" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						<a href='reset.php'>Forgot your Password?</a>
					</div>
				</div>
				
				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="login" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
<?php
include("config.php");


function generate_token() {
    return md5(microtime().mt_rand());
}

// $options = [
//     'salt' => generate_token(), //write your own code to generate a suitable salt
//     'cost' => 12 // the default cost is 10
// ];

$error = "";

if (isset($_POST["register"])) {
    // Thông tin người dùng
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passConfirm = $_POST["passwordConfirm"];
    if ($passConfirm != $password) {

        $error = "Xin vui long nhap dung password";

    } else {
        
        $salt = generate_token();

        // Chèn dữ liệu vào
        $sql = "INSERT INTO users(username,password,email,salt, level, status) VALUES ('$username', '$password', '$email', '$salt', '1', '0')";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        
        // Nếu thành công, gửi mail xác nhận
        if ($result) {
            include("lib/PHPMailer/PHPMailer.php");                   // Passing `true` enables exceptions
            try {
                $mail->addAddress($email);
                $mail->isHTML(true);                                 // Set email format to HTML
                $mail->Subject = 'Email Activate Account';
                $mail->Body    = "Click on the link to activate your account: " . "http://localhost:8888/www/github/BTL-Website-/BTL(SearchJob)/confirmation.php?user=$username&salt=$salt";
                
                $mail->send();

                setcookie("activate", "act-mail", time()+3600);
                header("location:index.php");
                exit();

            } catch (Exception $e) {
                $sql = "DELETE from users where username = '$username'";
                mysqli_query($conn, $sql);
                mysqli_close($conn);
                echo "<script>alert('Không thể gửi email kích hoạt!, Mời đăng ký lại');</script>";
                header("location: register.php");
                exit();
            }
        }
    }
}

//include header template
require('layout/header.php');
?>

<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="register.php" autocomplete="on">
				<h2>Please Sign Up</h2>
                <p>Already a member?<a href="login.php"> (-Login-)</a></p>
                <?php 
                    echo $error;
                ?>
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
				<div class="row">
					<div class="col-xs-12 col-md-12"><input type="submit" name="register" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="4"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
//include header template
require('layout/footer.php');
?>
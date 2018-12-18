<?php

session_start();
include("config.php");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * from users where username='$username'";
$result = mysqli_query($conn, $sql);
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
		else {
			$_SESSION["error"] = "Tên đăng nhập hoặc mật khẩu không chính xác!";
			header("location:index.php");
			exit();
		}
	}
}
mysqli_close($conn);

?>
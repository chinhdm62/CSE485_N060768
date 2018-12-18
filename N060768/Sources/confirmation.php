<?php
include('config.php');

// Passkey được lấy từ link
$salt = $_GET["salt"];
$user = $_GET["user"];

$options = [
    'salt' => $salt, //write your own code to generate a suitable salt
    'cost' => 12 // the default cost is 10
];

$sql="SELECT password FROM users WHERE username = '$user' and salt ='$salt'";
$result = mysqli_query($conn, $sql);

if($result) {
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $password = $row["password"];

        $hash = password_hash($password, PASSWORD_DEFAULT, $options);

        $sql = "UPDATE users set password= '$hash', status='1' where username = '$user'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            setcookie("mail", "mail", time()+3600);
            mysqli_close($conn);
            header("location:login.php");
            exit();
        }

    }
}

mysqli_close($conn);

?>
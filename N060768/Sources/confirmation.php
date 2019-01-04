<?php
require_once('connection.php');


// Passkey được lấy từ link
$user = $_GET["user"];
$sql="SELECT * FROM users WHERE username = '$user''";
$result = mysqli_query(Database::getConnection(), $sql);

if($result) {
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $sql = "UPDATE users set status='1' where username = '$user'";
        $result = mysqli_query(Database::getConnection(), $sql);
    }
}

?>
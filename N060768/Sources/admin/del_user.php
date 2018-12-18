<?php
    $id = $_GET["id"];

    // mở kết nối đến csdl
    require("../config.php");

    // thực hiện truy vấn
    $sql = "DELETE from users where id = '$id'";
    mysqli_query($conn, $sql);
    // đóng kết nối
    mysqli_close($conn);

    //
    header("location:list_user.php");
    exit();
?>
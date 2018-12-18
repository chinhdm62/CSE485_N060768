
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="top">
        <h3>Welcome Admin, <a href="../logout.php">(logout)</a></h3>
    </div>
    <div class="menu">
        <ul>
            <li><a href="list_user.php">Quản lí thành viên</a></li>
            <li><a href="list_emp.php">Quản lí nhà tuyển dụng</a></li>
            <li><a href="list_post.php">Quản lí bài đăng</a></a></li>
            <li><a href="list_cv.php">Quản lí CV</a></li>
        </ul>
    </div>
    <div style="clear:left;"></div>
    <div class="wrapper">
        <div></div>
        <table >
            <tr style="background:#0f6; color:#fff;">
                <th>STT</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th>Delete</th>
            </tr>
            <?php
                //Kết nối tới csdl
                require("../config.php");
                // thực hiện truy vấn
                $stt = 1;
                $sql = "SELECT id, username, email, level from users";
                mysqli_set_charset($conn, "utf8");
                $result = mysqli_query($conn, $sql);
                while($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td>$stt</td>";
                        echo "<td>$data[username]</td>";
                        echo "<td>$data[email]</td>";
                        if ($data["level"] == 1) {
                            echo "<td>Thành viên</td>";
                        } else {
                            echo "<td>Admin</td>";
                        }
                        echo "<td><a id='del' href='del_user.php?$data[id]' style='color:#f3f;'>Delete</a></td>";
                    echo "</tr>";
                    $stt++;
                }
                mysqli_close($conn);
            ?>
        </table>
    </div>
    <div class="bottom">Copyright &copy: by DMC</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/jquery-3.3.1.min.js"></script>
    <script src="admin.js"></script>

</body>

</html>
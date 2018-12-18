<?php
session_start();

if (isset($_COOKIE["activate"])) {
    echo "<script>alert('link kích hoạt tài khoản đã được gửi vào email của bạn!');</script>";
    setcookie("activate", "act-mail", time()-1);
}

$error = "";
if (isset($_POST["register"])) {
    if ($_POST["passwordConfirm"] != $_POST["password"]) {
        $error = "Xin vui long nhap dung password";
    } else {
        header("location:sign_up.php");
        exit();
    }
}

require("layout/header.php");

?>
<div id="popupBackg">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark top">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="./" style="font-size:30px;">Thực tập <span class="text-danger">IT</span></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse hide" id="navb">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Tạo CV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đăng tin</a>
                </li>
                <?php
                    if (isset($_SESSION["username"])) {
                        echo '<li class="nav-item">';
                            echo "<div class='nav-link text-success' >Welcome ".$_SESSION["username"]."</div>";
                        echo '</li>';
                        echo '<li class="nav-item">';
                            echo "<a class='nav-link text-success' href='logout.php' >Logout</a>";
                        echo '</li>';

                    } else {
                        echo '<li class="nav-item">';
                            echo '<div class="nav-link" id="btn-login">Login</div>';
                        echo '</li>';
                        echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="register.php">Register</a>';
                        echo '</li>';
                    }
                ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-1" type="text" placeholder="Search" size="50">
                <button class="form-control btn btn-success my-2 my-sm-0" type="button">Search</button>
            </form>
        </div>
    </nav>
    <hr>
    <div id="slide-show">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a><img class="size-img" src="assets/C-Full.png" alt=""></a>
                </div>
                <div class="carousel-item">
                    <a><img class="size-img" src="assets/java.jpg" alt=""><a />
                </div>
                <div class="carousel-item">
                    <a href="#"><img class="size-img" src="assets/nodejs.jpg" alt=""></a>
                </div>
                <div class="carousel-item">
                    <a href="#"><img class="size-img" src="assets/formend.png" alt=""></a>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>

<div class="container-fluid form-login">
    <div class="hide-login-btn"><i class="fas fa-times"></i></div>
    <br>
    <div style="width: 50%; margin:auto;">
        <form action="checkLogin.php" method="POST">
            <h2>Please Login</h2>
            <hr>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" size="25" class="form-control" name="username" tabindex="1" required autofocus>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="password" tabindex="2" required>
            </div>
            <div class="form-group">
                <label><input type="checkbox"> Remember me</label>
                <br>
                <a href='reset.php'>Forgot your Password?</a>
            </div>
            <div class="form-group">
                <?php
                    if (isset($_SESSION["error"])) {
                        echo '<script>$(".form-login").toggleClass("showed");</script>';
                        echo "<p>$_SESSION[error]</p>";
                        unset($_SESSION['error']);
                    }
                ?>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-lg" tabindex="3">Login</button>
        </form>
    </div>
    <br>
</div>

<?php
require("layout/footer.php");
?>
<?php
require_once('views/layouts/header.php');
?>

<!-- header -->
<div id="popupBackg">
    <!-- navigate bar -->
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
                            echo '<div class="nav-link" id="btn-signup">Register</div>';
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
    <!-- /navigate bar -->
    <hr>
    <!-- slide show -->
    <div id="slide-show">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators" style="z-index:1;">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a><img class="size-img" src="assets/images/C-Full.png" alt=""></a>
                </div>
                <div class="carousel-item">
                    <a><img class="size-img" src="assets/images/java.jpg" alt=""><a />
                </div>
                <div class="carousel-item">
                    <a href="#"><img class="size-img" src="assets/images/nodejs.jpg" alt=""></a>
                </div>
                <div class="carousel-item">
                    <a href="#"><img class="size-img" src="assets/images/CSharp.jpg" alt=""></a>
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
    <!-- /slide show -->
</div>
<!-- /header -->

<!-- form login -->
<div class="container-fluid form-login">
    <div class="hide-login-btn"><i class="fas fa-times"></i></div>
    <br>
    <div style="width: 50%; margin:auto;">
        <form action="?controller=checkLogin&action=check" method="POST">
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
                <!-- <label><input type="checkbox"> Remember me</label> -->
                <!-- <br> -->
                <a href='reset.php'>Forgot your Password?</a>
            </div>
            <div class="form-group">
                <?php
                    if (isset($err_login) || isset($err_status)) {
                        echo '<script>
                        $(".form-login").css("transition", "none").toggleClass("showed");
                        $("#btn-signup").toggleClass("disabledbutton");
                        </script>';

                        if (isset($err_login)) {
                            echo "<p class='text-center bg-danger'>$err_login</p>";
                        }
                    
                        if (isset($err_status)) {
                            echo "<p class='text-center bg-danger'>$err_status</p>";
                        } 
                    }
                ?>
                <script>$(".form-login").css("transition", '0.4s');</script>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-lg" tabindex="3">Login</button>
        </form>
    </div>
    <br>
</div>
<!-- /form login -->

<!-- form register -->
<div class="container-fluid form-register">
    <div class="hide-signup-btn"><i class="fas fa-times"></i></div>
    <br>
    <div style="width: 50%; margin:auto;">
        <form action="?controller=checkRegister&action=check" method="POST">
            <h2>Please Register</h2>
            <hr>
            <div class="form-group">
                <input type="text" size="25" class="form-control" name="username" placeholder="User Name" tabindex="5" required autofocus>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email Address" tabindex="6" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password-signup" placeholder="Password" tabindex="7" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="passwordConfirm" id="passwordConf-signup" placeholder="Confirm Password" tabindex="8" required>
            </div>
            <div class="form-group">
                <p class="bg-danger text-center" id="error-signup"></p>
                <?php
                    if (isset($err_username_signup)) {
                        echo '<script>
                        $(".form-register").css("transition", "none").toggleClass("showed");
                        $("#btn-login").toggleClass("disabledbutton");
                        </script>';
                        echo "<p class='text-center bg-danger'>$err_username_signup</p>";
                    }
                ?>
                <script>$(".form-register").css("transition", '0.4s');</script>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-lg" id="register" name="register" tabindex="9">Register</button>
        </form>
    </div>
    <br>
</div>
<!-- /form register -->
<hr>
<!-- page content -->
<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-8">
            <h4>Công Việc Thực Tập - MỚI</h4>
            <hr>
            <?php
                if (isset($posts)) {
                    foreach ($posts as $post) {
                        echo "<div class='list-group'>
                            <a href='#' class='list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center'>$post->title
                            <span class='badge badge-primary badge-pill'>12</span>
                            </a>
                            <div class='list-group-item'>$post->nameCompany</div>
                            <div class='list-group-item'>$post->workingForm</div>
                            <div class='list-group-item'>$post->deadline</div>
                        </div>";
                        echo "<hr>";
                    }
                }
            ?>
        </div>
        <div class="col-md-4">
            <h4>Công Việc Thực Tập - HOT</h4>
            <hr>
            <?php
                if (isset($posts)) {
                    foreach ($posts as $post) {
                        echo "<div class='list-group'>
                            <a href='#' class='list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center'>$post->title
                            <span class='badge badge-primary badge-pill'>160</span>
                            </a>
                            <div class='list-group-item'>$post->nameCompany</div>
                            <div class='list-group-item'>$post->workingForm</div>
                            <div class='list-group-item'>$post->deadline</div>
                        </div>";
                        echo "<hr>";
                    }
                }
            ?>
        </div>
    </div>
</div>
<!-- /page content -->
<hr>
<!-- footer -->
<div class="container-fluid footer">
    <div class="text-center bg-primary">
        <h4>Copyright &copy by DMC</h4>
        <h5>Đỗ Mạnh Chính-58TH1</h5>
        <h5>Dương Tuấn Vũ-58TH1</h5>
    </div>
</div>
<!-- /footer -->
<?php
require_once('views/layouts/footer.php');
?>
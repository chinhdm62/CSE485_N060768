<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="./" style="font-size:30px;">Thực tập <span class="text-danger">IT</span></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse hide" id="navb">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./"><i class="fa fa-fw fa-home"></i></a>
            </li>
            <?php 
                if (isset($_SESSION['username'], $_SESSION['level'])) {
                    if ($_SESSION['level'] == 1) {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='#'>Tạo hồ sơ</a>
                        </li>
                        <li class='nav-item' id='user'>
                            <a class='nav-link text-success' href='index.php?controller=candidate&action=genaral'>Welcome $_SESSION[username]</a>
                            <ul id='submenu-user'>
                                <li><a href='#'><i class='fa fa-edit'></i> Đăng hồ sơ</a></li>
                                <li><a href='#'><i class='far fa-file-alt'></i> Quản lý hồ sơ</a></li>
                                <li><a href='#'><i class='fa fa-user'></i> Quản lý tài khoản</a></li>
                                <li><a href='logout.php'><i class='fas fa-sign-out-alt'></i> Đăng xuất</a></li>
                            </ul>
                        </li>";
                    } else if ($_SESSION['level'] == 2){
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='index.php?controller=employer&action=emp_post'>Đăng bài</a>
                        </li>
                        <li class='nav-item' id='user'>
                            <a class='nav-link text-success' href='index.php?controller=employer&action=mag'>Welcome $_SESSION[username]</a>
                            <ul id='submenu-user'>
                                <li><a href='index.php?controller=employer&action=emp_post'><i class='fa fa-edit'></i> Đăng bài tuyển dụng</a></li>
                                <li><a href='index.php?controller=employer&action=mag'><i class='far fa-file-alt'></i> Quản lý bài đăng</a></li>
                                <li><a href='index.php?controller=employer&action=mag_acc'><i class='fa fa-user'></i> Quản lý tài khoản</a></li>
                                <li><a href='logout.php'><i class='fas fa-sign-out-alt'></i> Đăng xuất</a></li>
                            </ul>
                        </li>";
                    }
                } else {
                    echo "
                    <li class='nav-item'>
                        <div class='nav-link' id='cre-cv'>Tạo hồ sơ</div>
                    </li>
                    <li class='nav-item'>
                        <div class='nav-link' id='post'>Đăng tin</div>
                    </li>
                    <li class='nav-item'>
                        <div class='nav-link' id='btn-login'>Đăng nhập</div>
                    </li>
                    <li class='nav-item'>
                        <div class='nav-link' id='btn-signup'>Đăng ký</div>
                    </li>";
                }
            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-1" type="text" placeholder="Search" size="50">
            <button class="form-control btn btn-success my-2 my-sm-0" type="button">Search</button>
        </form>
    </div>
</nav>
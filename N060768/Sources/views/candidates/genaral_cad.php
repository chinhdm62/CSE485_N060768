<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="./" style="font-size:30px;">Thực tập <span class="text-danger">IT</span></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse hide" id="navb">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./"><i class="fas fa-home"></i></a>
            </li>
            <?php
                if (isset($_SESSION['username'], $_SESSION['level'])) {
                    if ($_SESSION['level'] == 1) {
                        echo "
                        <li class='nav-item' id='user'>
                            <a class='nav-link text-success' href='index.php?controller=candidate&action=genaral'>Welcome $_SESSION[username]</a>
                        </li>";
                    } else if ($_SESSION['level'] == 2){
                        echo "
                        <li class='nav-item' id='user'>
                            <a class='nav-link text-success' href='#'>Welcome $_SESSION[username]</a>
                        </li>";
                    }
                }
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#menu1">Quản lý hồ sơ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Quản lý tài khoản</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- menu1 -->
        <div id="menu1" class="container tab-pane active"><br>
            <form action="" method="POST">
                <h2>Thông tin chung</h2>
                <hr>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label>Tên đầy đủ</label>
                            <input type="text" size="25" class="form-control" name="" tabindex="">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Ngày sinh:</label>
                            <input type="date" class="form-control" name="">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Giới tính:</label>
                            <select name="level" class="custom-select">
                                <option value="">Nam</option>
                                <option value="">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Số điện thoại:</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Địa chỉ</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email:</label>
                            <input type="email" class="form-control" name="">
                        </div>
                        <div class="form-group">
                            <label>Giới thiệu bản thân:</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label>Kinh nghiệm:</label>
                            <input type="text" class="form-control" name="" placeholder='Nhà tuyển dụng'>
                            <br>
                            <input type="text" class="form-control" name="" placeholder='Tên công việc'>
                            <br>
                            <input type="text" class="form-control" name="" placeholder='Ngày bắt đầu/kết thúc'>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Các kỹ năng</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Thông tin khác:</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <button class="btn btn-primary btn-lg">Xác nhận</button>
            </form>
        </div>
        <!-- /menu1 -->
        
        <!-- menu2 -->
        <div id="menu2" class="container tab-pane fade"><br>
            <form action="index.php?controller=login&action=check" method="POST">
                <div class='row'>
                    <div class='col-md-6'>
                        <h2>Thay đổi thông tin</h2>
                        <hr>
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" size="25" class="form-control" name="username" tabindex="1">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email:</label>
                            <input type="email" class="form-control" name="password">
                        </div>
                        <br>
                        <div class="form-group">
                            <h2>Thay đổi mật khẩu</h2>
                            <hr>
                            <label for="pwd">Current Password</label>
                            <input type="text" class="form-control" name="">
                            <label for="pwd">New Password</label>
                            <input type="text" class="form-control" name="">
                            <label for="pwd">Confirm Password</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <hr>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg" tabindex="3">Xác nhận</button>
            </form>
        </div>
        <!-- /menu2 -->
    </div>
</div>
<br>

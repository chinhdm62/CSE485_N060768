
<?php
    if (!isset($_SESSION['level'])) {
        header('location:index.php');
        exit();
    }

?>
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
                    echo "
                    <li class='nav-item' id='user'>
                        <a class='nav-link text-success' href='index.php?controller=employer&action=mag'>Welcome $_SESSION[username]</a>
                        <ul id='submenu-user'>
                            <li><a href='index.php?controller=employer&action=emp_post'><i class='fa fa-edit'></i> Đăng bài tuyển dụng</a></li>
                            <li><a href='index.php?controller=employer&action=mag'><i class='far fa-file-alt'></i> Quản lý bài đăng</a></li>
                            <li><a href='index.php?controller=employer&action=mag_acc'><i class='fa fa-user'></i> Quản lý tài khoản</a></li>
                            <li><a href='logout.php'><i class='fas fa-sign-out-alt'></i> Đăng xuất</a></li>
                        </ul>
                    </li>
                    ";
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
            <a class="nav-link active" data-toggle="tab" href="#menu1" id='manager-post'>Quản lý bài đăng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2" id='post'>Đăng bài tuyển dụng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu3">Quản lý hồ sơ ứng tuyển</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu4">Quản lý tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu5">Thông tin về tài khoản</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Quản lý bài đăng -->
        <div id="menu1" class="container tab-pane active"><br>
            <div class="container">
                <h2>Quản lý bài đăng</h2> 
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên bài đăng</th>
                            <th>Ngày đăng</th>
                            <th>Ngày hết hạn</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        if (isset($manager_post)) {
                            $stt = 1;
                            for ($i=count($manager_post)-1; $i>=0; $i--) {
                                $title = $manager_post[$i]['title'];
                                $time_post = $manager_post[$i]['time_post'];
                                $deadline = $manager_post[$i]['deadline'];
                                echo "
                                <tr>
                                    <td>$stt</td>
                                    <td>$title</td>
                                    <td>$time_post</td>
                                    <td>$deadline</td>
                                    <td><a href='#'>Delete</a></td>
                                </tr>
                                ";
                                $stt++;
                            }   
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Quản lý bài đăng -->
        
        <!-- Đăng bài tuyển dụng -->
        <div id="menu2" class="container tab-pane"><br> 
            <form action="index.php?controller=employer&action=post" method="POST">
                <div class='row'>
                    <div class='col-md-8'>
                        <h2>Đăng bài</h2>
                        <hr>
                        <div class="form-group">
                            <label>Tiêu đề:</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Nơi làm việc:</label>
                            <input type="text" class="form-control" name="work_place">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Kỹ năng trong công việc:</label>
                            <input type="text" class="form-control" name="job_skills">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Kiểu làm việc:</label>
                            <div class="form-group">
                                <select name="type_work" class="custom-select custom-select-lg mb-3">
                                    <option value="Fulltime">Fulltime</option>
                                    <option value="Parttime">Parttime</option>
                                    <option value="Fulltime and Parttime">Fulltime and Parttime</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Ngày hết hạn:</label>
                            <input type="date" class="form-control" name="deadline">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Nội dung công việc:</label>
                            <textarea name="content_job" class="form-control" rows="6"></textarea>
                            <script>
                                CKEDITOR.replace( 'content_job' );
                            </script>
                        </div>
                        <hr>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Đăng bài</button>
            </form>
        </div>
        <!-- /Đăng bài tuyển dụng -->

        <!-- Quản lý hồ sơ dứng tuyển -->
        <div id="menu3" class="container tab-pane"><br>
            <h2>Quản lý bài đăng</h2> 
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Người nộp</th>
                        <th>Tên công việc</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                </tbody>
            </table>
        </div>
        <!-- /Quản lý hồ sơ ứng tuyển -->

        <!-- Quản lý tài khoản -->
        <div id="menu4" class="container tab-pane"><br>
            <form action="index.php?controller=employer?action=repair_acc" method="POST">
                <div class='row'>
                    <div class='col-md-6'>
                        <h2>Thay đổi thông tin</h2>
                        <hr>
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" class="form-control" name="" value="<?php 
                                if (isset($manager_account)) echo $manager_account['username'];?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email:</label>
                            <input type="text" class="form-control" name="" value="<?php
                                if (isset($manager_account)) echo $manager_account['email'];?>" disabled>
                        </div>
                        <br>
                        <div class="form-group">
                            <h2>Thay đổi mật khẩu</h2>
                            <hr>
                            <p class="bg-danger text-center" id="error-signup"></p>
                            <label for="pwd">Current Password</label>
                            <input type="text" class="form-control" name="pass_old">
                            <label for="pwd">New Password</label>
                            <input type="text" class="form-control" name="pass_new" id="password-signup">
                            <label for="pwd">Confirm Password</label>
                            <input type="text" class="form-control" name="pass_new_conf" id="passwordConf-signup">
                        </div>
                        <hr>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg" tabindex="3" id="register">Xác nhận</button>
            </form>
        </div>
        <!-- /Quản lý tài khoản -->

        <!-- Thông tin về tài khoản -->
        <div id="menu5" class="container tab-pane"><br>
            <form action="index.php?" method="POST">
                <div class='row'>
                    <div class='col-md-8'>
                        <h2>Thay đổi thông tin</h2>
                        <hr>
                        <div class="form-group">
                            <label>Người liên lạc:</label>
                            <input type="text" size="25" class="form-control" name="" value="<?php if(isset($manager_infor)) { echo $manager_infor->per_contact;}?>">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input type="text" size="25" class="form-control" name="" value="<?php if(isset($manager_infor)) { echo $manager_infor->address;}?>">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại liên lạc:</label>
                            <input type="text" size="25" class="form-control" name="" value="<?php if(isset($manager_infor)) { echo $manager_infor->phonenumber;}?>">
                        </div>
                        <div class="form-group">
                            <label>Mô tả công ty:</label>
                            <textarea class="form-control" rows='5' name="description_comp"><?php if(isset($manager_infor)) { echo $manager_infor->description;}?></textarea>
                            <script>
                                CKEDITOR.replace('description_comp');
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Ngày thành lập công ty:</label>
                            <input type="date" size="25" class="form-control" name="" value="<?php if(isset($manager_infor)) { echo $manager_infor->build_date;}?>">
                        </div>
                        <div class="form-group">
                            <label>Tên công ty:</label>
                            <input type="text" size="25" class="form-control" name="" value="<?php if(isset($manager_infor)) { echo $manager_infor->name_company;}?>">
                        </div>
                        <br>
                        <hr>
                    </div>
                    <div class='col-md-4'>
                        <img src="assets/images/<?php if(isset($manager_infor)) { echo $manager_infor->logo;}?>" alt="" width='350px' height='350px'>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Xác nhận</button>
            </form>
        </div>
        <!-- /Thông tin về tài khoản -->
    </div>
</div>
<br>

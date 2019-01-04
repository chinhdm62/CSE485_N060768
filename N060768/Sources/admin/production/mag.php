<?php require_once('layout/header.php'); ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>THỰC TẬP IT</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php require_once('layout/menu_profile_quick_info.php');?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php require_once('layout/sidebar.php');?>
            <!-- /sidebar menu -->
        </div>
      </div>

        <!-- top navigation -->
        <?php require_once('layout/top_navigation.php');?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox">
                      <li><h1>Bài đăng</h1></li>
                    </ul>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable_job" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Company</th>
                          <th>Tên bài</th>
                          <th>Ngày đăng</th>
                          <th>Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require_once('../../connection.php');
                          $result = mysqli_query(Database::getConnection(), 'SELECT * from employer, job_posting where (employer.id = job_posting.id_employer)');
                          while($data = mysqli_fetch_assoc($result)) {
                            echo "
                              <tr>
                                <td>$data[name_company]</td>
                                <td>$data[title]</td>
                                <td>$data[time_post]</td>
                                <td><a href='#'>Delete</a></td>
                              </tr>
                            ";
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox">
                      <li><h1>Người dùng</h1></li>
                    </ul>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable_users" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Quyền hạn</th>
                          <th>Trạng thái</th>
                          <th>Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require_once('../../connection.php');
                          $result = mysqli_query(Database::getConnection(), 'SELECT username, email, level, status from users');
                          while($data = mysqli_fetch_assoc($result)) {
                            if ($data['level'] == 1) {
                              $level = 'candidate';
                            }
                            if ($data['level'] == 2) {
                              $level = 'employer';
                            }
                            if ($data['level'] == 3) {
                              $level = 'admin';
                            }
                            if ($data['status'] == 0) {
                              $status = 'Chưa kích hoạt';
                            }
                            if ($data['status'] == 1) {
                              $status = 'Đã kích hoạt';
                            }
                            echo "
                              <tr>
                                <td>$data[username]</td>
                                <td>$data[email]</td>
                                <td>$level</td>
                                <td>$status</td>
                                <td><a href='#'>Delete</a></td>
                              </tr>
                            ";
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox">
                      <li><h1>Nhà tuyển dụng</h1></li>
                    </ul>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable_emp" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Tên công ty</th>
                          <th>Tên người liên lạc</th>
                          <th>Địa chỉ</th>
                          <th>Số điện thoại</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require_once('../../connection.php');
                          $result = mysqli_query(Database::getConnection(), 'SELECT * from employer');
                          while($data = mysqli_fetch_assoc($result)) {
                            echo "
                              <tr>
                                <td>$data[name_company]</td>
                                <td>$data[per_contact]</td>
                                <td>$data[address]</td>
                                <td>$data[phonenumber]</td>
                                <td><a href='#'>Delete</a></td>
                              </tr>
                            ";
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<?php require_once('layout/footer.php'); ?>
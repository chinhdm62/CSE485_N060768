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

          <br>

          <!-- sidebar menu -->
        <?php require_once('layout/sidebar.php');?>
        <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <?php require_once('layout/top_navigation.php');?>
      <!-- /top navigation -->

      

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Website tìm việc thực tập
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
      
      <!-- footer content -->
      <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->

    </div>
  </div>

<?php require_once('layout/footer.php'); ?>
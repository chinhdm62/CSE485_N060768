
<!-- top -->
<div id="popupBackg">
    <!-- navigate bar -->
    <?php require_once('views/layouts/navigatebar.php');?>
    <!-- /navigate bar -->
    
    <!-- slide show -->
    <?php require_once('views/layouts/slide_show.php');?>
    <!-- /slide show -->
</div>
<!-- /top -->
<!-- form login -->
<?php require_once('views/layouts/login.php');?>
<!-- /form login -->
<!-- form register -->
<?php require_once('views/layouts/register.php');?>
<!-- /form register -->
<hr>
<!-- page content -->
<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-8">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Công Việc Thực Tập - Mới</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Công Việc Thực Tập - HOT</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <h4>Công Việc Thực Tập - MỚI</h4>
                    <hr>
                    <?php 
                    if (isset($posts)) {
                        
                        foreach ($posts as $post) {
                            echo "
                            <div class='list-group'>
                                <a href='index.php?controller=pages&action=detail&idEmp=$post->id' class='list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center' onclick='detail($post->id, $post->num_click)'>$post->title
                                    <span class='badge badge-primary badge-pill'>$post->num_click view</span>
                                </a>
                                <div class='list-group-item'>
                                    <div class='media'>
                                        <img src='assets/images/img_avatar1.png' class='align-self-center mr-3' style='width:100px'>
                                        <div class='media-body'>
                                            <div><i class='far fa-building'></i> $post->name_company</div>
                                            <hr>
                                            <div><i class='fas fa-language'></i> $post->job_skills</div>
                                            <div><i class='fa fa-bookmark'></i> $post->type_work</div>
                                            <div><i class='far fa-calendar-alt'></i> $post->deadline</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            ";
                        }

                        $display = 5;
                        $sum_news = count($count);
                        $sum_page = ceil($sum_news/$display);
                        if ($sum_page > 1) {
                            if (isset($_GET['begin'])) $pos = $_GET['begin'];
                            else $pos = 0;
                            $current = ($pos/$display) + 1;

                            $pre = $pos-$display;
                            $next = $pos+$display;
                            if ($pre < 0) {
                                $pre = 0;
                                echo "
                                <ul class='pagination justify-content-center'>
                                <li class='page-item'><a class='page-link' href='index.php?begin=$pre'>Previous</a></li>
                                ";
                            } else {
                                echo "
                                <ul class='pagination justify-content-center'>
                                <li class='page-item'><a class='page-link' href='index.php?begin=$pre'>Previous</a></li>
                                ";
                            }
                            for ($page=1; $page<=$sum_page;$page++) {
                                $begin = ($page-1)*$display;
                                if ($page == $current) {
                                    echo "
                                    <li class='page-item'><a class='page-link text-danger' href='index.php?begin=$begin'>$page</a></li>
                                    ";
                                } else {
                                    echo "
                                    <li class='page-item'><a class='page-link' href='index.php?begin=$begin'>$page</a></li>
                                    ";
                                }
                            }

                            if ($next > $sum_news) {
                                $next = $sum_news-1;
                                echo "<li class='page-item'><a class='page-link' href='index.php?begin=$next'>Next</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='index.php?begin=$next'>Next</a></li>";
                            }

                            echo "</ul>";
                        }
                    }
                    ?>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                <h4>Công Việc Thực Tập - HOT</h4>
                    <hr>
                    <?php 
                    if (isset($posts_hot)) {
                        
                        foreach ($posts_hot as $post) {
                            echo "
                            <div class='list-group'>
                                <a href='index.php?controller=pages&action=detail&idEmp=$post->id' class='list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center' onclick='detail($post->id, $post->num_click)'>$post->title
                                    <span class='badge badge-primary badge-pill'>$post->num_click view</span>
                                </a>
                                <div class='list-group-item'>
                                    <div class='media'>
                                        <img src='assets/images/img_avatar1.png' class='align-self-center mr-3' style='width:100px'>
                                        <div class='media-body'>
                                            <div><i class='far fa-building'></i> $post->name_company</div>
                                            <hr>
                                            <div><i class='fas fa-language'></i> $post->job_skills</div>
                                            <div><i class='fa fa-bookmark'></i> $post->type_work</div>
                                            <div><i class='far fa-calendar-alt'></i> $post->deadline</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            ";
                        }

                        $display = 5;
                        $sum_news = count($count);
                        $sum_page = ceil($sum_news/$display);
                        if ($sum_page > 1) {
                            if (isset($_GET['begin'])) $pos = $_GET['begin'];
                            else $pos = 0;
                            $current = ($pos/$display) + 1;

                            $pre = $pos-$display;
                            $next = $pos+$display;
                            if ($pre < 0) {
                                $pre = 0;
                                echo "
                                <ul class='pagination justify-content-center'>
                                <li class='page-item'><a class='page-link' href='index.php?begin=$pre'>Previous</a></li>
                                ";
                            } else {
                                echo "
                                <ul class='pagination justify-content-center'>
                                <li class='page-item'><a class='page-link' href='index.php?begin=$pre'>Previous</a></li>
                                ";
                            }
                            for ($page=1; $page<=$sum_page;$page++) {
                                $begin = ($page-1)*$display;
                                if ($page == $current) {
                                    echo "
                                    <li class='page-item'><a class='page-link text-danger' href='index.php?begin=$begin'>$page</a></li>
                                    ";
                                } else {
                                    echo "
                                    <li class='page-item'><a class='page-link' href='index.php?begin=$begin'>$page</a></li>
                                    ";
                                }
                            }

                            if ($next > $sum_news) {
                                $next = $sum_news-1;
                                echo "<li class='page-item'><a class='page-link' href='index.php?begin=$next'>Next</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='index.php?begin=$next'>Next</a></li>";
                            }

                            echo "</ul>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<hr>
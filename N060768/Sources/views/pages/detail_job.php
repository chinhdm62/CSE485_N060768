
<!-- navigate bar -->
<?php require_once('views/layouts/navigatebar.php');?>
<!-- /navigate bar -->
<!-- form login -->
<?php require_once('views/layouts/login.php');?>
<!-- /form login -->
<!-- form register -->
<?php require_once('views/layouts/register.php');?>
<!-- /form register -->
<div class="container-fluid bg-info" style="height:300px">
    <?php
        echo "
        <div class='container' style='line-height:200px'>
            <p>
                <span class='display-3'>$detail_job[title]</span>
                <span class='badge badge-primary badge-pill small'>$detail_job[num_click] lượt xem</span>
            </p>
        </div>
        <div></div>
        ";
    ?>
</div>
<hr>
<div class="container">
    <?php
    echo $detail_job['content_job'];
    ?>
</div>
<hr>
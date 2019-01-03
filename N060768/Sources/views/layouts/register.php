<div class="container-fluid form-register">
    <div class="hide-signup-btn"><i class="fas fa-times"></i></div>
    <a class="home" href="./"><i class="fas fa-home"></i></a>
    <br>
    <div style="width: 50%; margin:auto;">
        <form action="index.php?controller=register&action=check" method="POST">
            <div class="form-group">
                <h2>Please Register</h2>
            </div>
            <hr>
            <div class="form-group">
                <input type="text" size="25" class="form-control" id='username-signup' name="username" placeholder="User Name" tabindex="5" required autofocus>
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
                <select name="level" class="custom-select mb-3">
                    <option selected>Select Menu</option>
                    <option value="2">Nhà tuyển dụng - Cần tuyển dụng sinh viên</option>
                    <option value="1">Sinh viên - Cần tìm công việc thực tập</option>
                </select>
            </div>
            <div class="form-group" id="err-signup">
                <p class="bg-danger text-center" id="error-signup"></p>
                <?php
                    if (isset($err_username_exist) || isset($err_select_level)) {
                        echo '
                        <script>
                            $(".form-register").css("transition", "none").toggleClass("showed");
                            $("#btn-login").toggleClass("disabledbutton");
                        </script>';
                        if (isset($err_username_exist)) {
                            echo "<p class='text-center bg-danger'>$err_username_exist</p>";
                        }
                        if (isset($err_select_level)) {
                            echo "<p class='text-center bg-danger'>$err_select_level</p>";
                        }
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
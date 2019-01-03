<div class="container-fluid form-login">
    <div class="hide-login-btn"><i class="fas fa-times"></i></div>
    <a class="home" href="./"><i class="fas fa-home"></i></a>
    <br>
    <div style="width: 50%; margin:auto;">
        <form action="index.php?controller=login&action=check" method="POST">
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
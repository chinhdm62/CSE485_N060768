<?php

require_once('controllers/c_base.php');
require_once('models/m_users.php');
require_once('models/m_v_show_job.php');

class LoginController extends BaseController {

    private $username, $password;

    function __construct() {
        $this->folder = "pages";
        $this->username = $_POST["username"];
        $this->password = $_POST["password"];
    }

    public function check() {
        $sql = "SELECT * from users where username='$this->username'";
        $dataUsers = Users::getData($sql);
        $data = array('posts' => ShowJob::getAllData());
        if (!empty($dataUsers)) {
            $level = $dataUsers["level"];
            $status = $dataUsers['status'];
            if ($status == 1) {
                if ($level != 3 && password_verify($this->password, $dataUsers["password"])) {
                    $_SESSION["username"] = $this->username;
                    if ($level == 1) {
                        $_SESSION['level'] = 1;
                        header('location:index.php');
                        exit();
                    }
                    if ($level == 2) {
                        $_SESSION['level'] = 2;
                        header('location:index.php?controller=employer&action=mag');
                        exit();
                    }
                    
                } else if ($level == 3 && $this->password == $dataUsers["password"]) {
                    header('location:admin/production/manager.php');
                    exit();
                } else {
                    $data['err_login'] = "Tên tài khoản hoặc mật khẩu không chính xác!";
                }
            } else {
                $data["err_status"] = "Tài khoản chưa được kích hoạt!";
            }
        } else {
            $data["err_login"]= "Tên tài khoản hoặc mật khẩu không chính xác!";
        }

        $this->render('home', $data);
    }
}
<?php

require_once('controllers/c_base.php');
require_once('models/m_users.php');

function generate_token() {
    return md5(microtime().mt_rand());
}

class CheckRegisterController extends BaseController {

    private $username, $password, $email;

    function __construct() {
        $this->folder = "pages";
        $this->username = $_POST["username"];
        $this->password = $_POST["password"];
        $this->email = $_POST["email"];
    }

    public function check() {
        $sql = "SELECT * from users where username='$this->username'";
        $data = Users::getData($sql);
        $error = array();
        if (empty($data)) {
            $salt = generate_token();
            // Chèn dữ liệu vào
            $sql = "INSERT INTO users(username,password,email,salt, level, status) VALUES ('$this->username', '$this->password', '$this->email', '$salt', '1', '0')";
            
        } else {
            $error["err_username_signup"]= "Tên tài khoản đã tồn tại!";
        }
        $this->render('home', $error);
    }
}
<?php

require_once('controllers/c_base.php');
require_once('models/m_users.php');
require_once('models/m_v_show_job.php');

function generate_token() {
    return md5(microtime().mt_rand());
}

class RegisterController extends BaseController {

    private $username, $password, $email, $level;

    function __construct() {
        $this->folder = "pages";

        $this->username = $_POST["username"];
        $this->password = $_POST["password"];
        $this->email = $_POST["email"];
        $this->level = $_POST["level"];
    }

    public function check() {
        $data = array('posts' => ShowJob::getData_2());

        if ($this->level == "Select Menu") {
            $data['err_select_level'] = "Bạn chưa chọn user role";
        } else {
            $dataUsers = Users::getData("SELECT username from users where username='$this->username'");

            if (empty($dataUsers['username'])) { // Tên tài khoản chưa tồn tại - cho phép đăng ký
                $dataUsers = Users::getData("SELECT email from users where email='$this->email'");

                if (empty($dataUsers['email'])) { // Email chưa tồn tại - cho phép đăng ký

                    $salt = generate_token();
                    $options = [
                        'salt' => $salt, //write your own code to generate a suitable salt
                        'cost' => 12 // the default cost is 10
                    ];
                    $hash = password_hash($this->password, PASSWORD_DEFAULT, $options);

                    // Chèn dữ liệu vào
                    $sql = "INSERT INTO users(username,password,email, level, status) VALUES ('$this->username', '$hash', '$this->email', '$this->level', '0')";

                    if (Users::executeQuery($sql)) {
                        include("assets/libraries/PHPMailer/PHPMailer.php");                   // Passing `true` enables exceptions

                        try {
                            $mail->addAddress($this->email);
                            $mail->isHTML(true);                                 // Set email format to HTML
                            $mail->Subject = 'Email Activate Account';
                            $mail->Body    = "Click on the link to activate your account: " . "http://localhost:8888/CSE485_N060768/N060768/Sources/confirmation.php?user=$this->username";
                            
                            $mail->send();
                            
                            echo "<script>alert('mail kích hoạt đã được gửi vào mail để kích hoạt');</script>";
                            header("location: index.php");
                            exit();

                        } catch (Exception $e) {
                            echo "<script>alert('Không thể gửi email kích hoạt!, Mời đăng ký lại');</script>";
                            header("location: index.php");
                            exit();
                        }

                    } else {
                        echo "
                        <script>
                            alert('Đăng ký thất bại');
                        </script>
                        ";
                    }
                    // gửi mail xác nhận

                } else {
                    $data['err_email_exist'] = 'Tài khoản email đẫ tồn tại!';
                }

            } else { // Tài khoản đã tồn tại - thông báo lỗi
                $data["err_username_exist"]= "Tên tài khoản đã tồn tại!";
            }
        }
        $this->render('home', $data);
    }
}
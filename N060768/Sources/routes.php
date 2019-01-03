<?php
$controllers = array(
    'pages' => ['home', 'error', 'postjob', 'detail'],
    'login' => ['check'],
    'register' => ['check'],
    'candidate' => ['genaral'],
    'employer' => ['mag', 'emp_post', 'post', 'mag_acc', 'repair_acc']
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('controllers/c_' . $controller . '.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$klass = str_replace('_', '', ucwords($controller)) . 'Controller';
$controller = new $klass;
$controller->$action();

// switch ($klass) {
//     case 'PagesController':
//         $controller->$action();
//         break;
//     case 'LoginController':
//         $controller->$action();
//         break;
//     case 'RegisterController':
//         $controller->$action();
//         break;
//     default:
//         break;
// }
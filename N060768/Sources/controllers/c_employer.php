<?php

require_once('controllers/c_base.php');
require_once('models/m_job_posting.php');
require_once('models/m_users.php');
require_once('models/m_employer.php');

class EmployerController extends BaseController {

    public $data = array();

    function __construct() {
        $this->folder = 'employers';

        $this->data['manager_post'] = JobPosting::managerJost();
        $this->data['manager_account'] = Users::getData("SELECT username, email from users where username = '$_SESSION[username]'");
        $this->data['manager_infor'] = Employer::getData();
    }

    public function mag() {
        $this->render('mag_genaral', $this->data);
    }

    public function emp_post() {
        $this->render('emp_post', $this->data);
    }

    public function mag_acc() {
        $this->render('mag_acc', $this->data);
    }

    public function post() {

        $id_employer = Users::getIdEmployerByIdUsers($_SESSION['username']);
        $time_post = date('Y/m/d H:i:s');
        $title = $_POST['title']; 
        $work_place = $_POST['work_place']; 
        $job_skills = $_POST['job_skills']; 
        $type_work = $_POST['type_work'];
        $deadline = $_POST['deadline'];
        $content_job = $_POST['content_job'];

        if (JobPosting::postJob($id_employer, $time_post, $title, $work_place, $job_skills, 
        $type_work, $deadline, $content_job)) {
            header('location:index.php?controller=employer&action=mag');
            exit();
        }
    }

    public function repair_acc() {
        $pass_old = $_POST['pass_old'];
        $pass_new = $_POST['pass_new'];

        if (Users::repair_acc($_SESSION['username'], $pass_new)) {
            echo "<script> alert('Thay đổi thành công');</script>";
            header('location:index.php?controller=employer&action=mag_acc');
            exit();
        }
    }
}
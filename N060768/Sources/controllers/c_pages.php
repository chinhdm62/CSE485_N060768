<?php

require_once('controllers/c_base.php');
require_once('models/m_v_show_job.php');
require_once('models/m_job_posting.php');

class PagesController extends BaseController {

    public $data = array();

    function __construct() {
        $this->folder = 'pages';
    }

    public function home() {
        // $dataPost = ShowJob::getAllData("SELECT * from v_showjob");
        // print_r($dataPost);
        if (isset($_GET['begin'])) $pos = $_GET['begin'];
        else $pos = 0;
        $dis = 5;

        $this->data['posts'] = ShowJob::getData($pos, $dis);
        $this->data['count'] = ShowJob::getData_2();
        $this->data['posts_hot'] = ShowJob::getData_3($pos, $dis);
        $this->render('home', $this->data);
    }

    public function detail() {
        $idEmp = $_GET['idEmp'];

        $this->data['detail_job'] = JobPosting::getContentJob($idEmp);

        $this->render('detail_job', $this->data);
    }

    public function error() {
        $this->render('page_404');
    }
}
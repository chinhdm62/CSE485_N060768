<?php

require_once('controllers/c_base.php');
require_once('models/m_showjob.php');

class PagesController extends BaseController {

    function __construct() {
        $this->folder = 'pages';
    }

    public function home() {
        $sql = "SELECT * from v_showjob";

        $dataJobPosting = ShowJob::getAllData($sql);
        $data = array('posts' => $dataJobPosting);
        $this->render('home', $data);
    }

    public function error() {
        $this->render('page_404');
    }
}
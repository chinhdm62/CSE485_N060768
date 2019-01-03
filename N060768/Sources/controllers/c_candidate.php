<?php

require_once('controllers/c_base.php');

class CandidateController extends BaseController {

    function __construct() {
        $this->folder = 'candidates';
    }

    public function genaral() {
        $this->render('genaral_cad');
    }
}
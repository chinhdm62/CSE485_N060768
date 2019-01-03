<?php
require_once('connection.php');
require_once('models/m_job_posting.php');

$id = $_REQUEST['id'];
$num_click = $_REQUEST['num_click'];

JobPosting::plusClick($id, $num_click);


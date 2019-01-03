<?php

require_once('connection.php');

class ShowJob {
    
    public $id, $title, $name_company, $job_skills, $deadline, $type_work, $num_click;

    function __construct($id, $title, $name_company, $job_skills, $deadline, $type_work, $num_click) {
        $this->id = $id;
        $this->title = $title;
        $this->name_company = $name_company;
        $this->job_skills = $job_skills;
        $this->deadline = $deadline;
        $this->type_work = $type_work;
        $this->num_click = $num_click;
    }

    public static function getAllData() {
        $sql = "SELECT * from v_show_job";
        $data = array();
        try {
            $result = mysqli_query(Database::getConnection(), $sql);
            if (mysqli_num_rows($result) > 0)  {
                while ($row = mysqli_fetch_assoc($result)) {
                    $deadline = new DateTime($row['deadline']);
                    $deadline = date_format($deadline, 'd-m-Y');
                    $data[] = new ShowJob($row['id'], $row['title'], $row['name_company'], $row['job_skills'], $deadline, $row['type_work'], $row['num_click']);
                }
            }
            return $data;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}
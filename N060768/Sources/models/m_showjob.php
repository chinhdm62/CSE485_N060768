<?php

require_once('connection.php');

class ShowJob {
    
    public $title, $nameCompany, $fields, $deadline, $workingForm;

    function __construct($title, $nameCompany, $fields, $deadline, $workingForm) {
        $this->title = $title;
        $this->nameCompany = $nameCompany;
        $this->fields = $fields;
        $this->deadline = $deadline;
        $this->workingForm = $workingForm;
    }

    public static function getAllData($sql) {
        $data = array();
        try {
            $result = mysqli_query(Database::getConnection(), $sql);
            if (mysqli_num_rows($result) > 0)  {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = new ShowJob($row['title'], $row['nameCompany'], $row['fields'], $row['deadline'], $row['workingForm']);
                }
            }
            mysqli_close(Database::getConnection());
            return $data;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}
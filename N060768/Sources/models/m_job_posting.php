<?php

require_once('connection.php');

class JobPosting {
    
    public static function postJob($id_employer, $time_post, $title, $work_place, $job_skills, $type_work, $deadline, $content_job) {
        $sql = "INSERT INTO job_posting(id_employer, time_post, title, work_place, job_skills, type_work, deadline, content_job) VALUES ('$id_employer', '$time_post', '$title', '$work_place', '$job_skills', '$type_work', '$deadline', '$content_job')";
        try {
            $result = mysqli_query(Database::getConnection(), $sql);
            return $result;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public static function managerJost() {
        $sql = "SELECT title, time_post, deadline from v_show_job";
        $data = array();
        try {
            $result = mysqli_query(Database::getConnection(), $sql);
            if (mysqli_num_rows($result) > 0)  {
                while ($row = mysqli_fetch_assoc($result)) {

                    $deadline = new DateTime($row['deadline']);
                    $deadline = date_format($deadline, 'd-m-Y');

                    $time_post = new DateTime($row['time_post']);
                    $time_post = date_format($time_post, 'd-m-Y H:i:s');

                    $data[] = array(
                        'title' => $row['title'],
                        'time_post' => $time_post,
                        'deadline' => $deadline
                    );
                }
            }
            return $data;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public static function plusClick($id, $num_click) {
        $sql = "UPDATE job_posting SET num_click='$num_click' WHERE id='$id'";
        try {
            mysqli_query(Database::getConnection(), $sql);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public static function getContentJob($id) {
        $sql = "SELECT * from job_posting WHERE id='$id'";
        try {
            $result = mysqli_query(Database::getConnection(), $sql);
            $data = mysqli_fetch_assoc($result);
            return $data;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}
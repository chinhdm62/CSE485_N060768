<?php

require_once('connection.php');

class Users {

    public $id, $username, $password, $email, $level, $status;
    
    public static function getData($sql) {
        $data = NULL;
        try {
            $result = mysqli_query(Database::getConnection(), $sql);
            if (mysqli_num_rows($result) == 1)  {
                $data = mysqli_fetch_assoc($result);
            }
            mysqli_close(Database::getConnection());
            return $data;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}

?>
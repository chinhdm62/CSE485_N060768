<?php

require_once('connection.php');

class Users {

    public $id, $username, $password, $email, $level, $status;
    
    public static function getData($sql) {
        $data = NULL;
        try {
            $result = mysqli_query(Database::getConnection(), $sql);
            $data = mysqli_fetch_assoc($result);
            return $data;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }   

    public static function executeQuery($sql) {
        $result = NULL;
        try {
            $result = mysqli_query(Database::getConnection(), $sql);
            return $result;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public static function getIdEmployerByIdUsers($username) {
        try {
            $sql = "SELECT employer.id from users, employer where (employer.id_users = users.id) and (users.username = '$username')";
            $result = mysqli_query(Database::getConnection(), $sql);
            $data = mysqli_fetch_assoc($result);
            return $data['id'];
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public static function repair_acc($username, $pass_new) {
        try {
            $sql = "UPDATE users set password= '$pass_new' where username = '$username'";
            $result = mysqli_query(Database::getConnection(), $sql);
            return $result;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}

?>
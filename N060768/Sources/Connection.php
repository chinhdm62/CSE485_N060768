<?php
// used to get mysql database connection
class Database {
    private static $conn = NULl;

    public static function getConnection() {
        if (!isset(self::$conn)) {
            try {
                self::$conn = mysqli_connect('localhost','root', '', 'searchjobit');
                mysqli_set_charset(Database::getConnection(), 'utf8');
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        return self::$conn;
    }
}

?>
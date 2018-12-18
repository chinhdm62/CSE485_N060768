<?php

class Connection {
    private $host, $username, $password, $database;

    public function __construct($database) {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = $database;
    }

    public function getHost() {
        return $this->host;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getDatabase() {
        return $this->database;
    }

    public function settHost($host) {
        $this->host = $host;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function settPassword($password) {
        $this->password = $password;
    }

    public function settDatabase($database) {
        $this->database = $database;
    }

    public function getConnection() {
        return mysqli_connect($this->getHost(), $this->getUsername(), $this->getPassword(), $this->getDatabase());
    }

    public function closeConnetion() {
        return mysqli_close($this->getConnection());
    }
}

class Query {
    private $conn;

    public function __construct() {
        $this->conn = new Connetion();
    }

    public function executeQuery($sql) {
        $result = mysqli_query($this->conn->getConnection(), $sql);
        $this->conn->closeConnetion();
        return $result;
    }

}

?>
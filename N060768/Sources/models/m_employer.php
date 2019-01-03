<?php

class Employer {
    public $id, $id_users, $per_contact, $address, $phonenumber, $description, $logo, $build_date, $name_company;

    public function __construct($id, $id_users, $per_contact, $address, $phonenumber, $description, $logo, $build_date, $name_company) {
        $this->id = $id;
        $this->id_users = $id_users; 
        $this->per_contact = $per_contact; 
        $this->address = $address; 
        $this->phonenumber = $phonenumber;
        $this->description = $description; 
        $this->logo = $logo;
        $this->build_date = $build_date;
        $this->name_company = $name_company;
    }

    public static function getData() {
        $sql = "SELECT * from employer";
        $data;
        try {
            $result = mysqli_query(Database::getConnection(), $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $data = new Employer($row['id'], $row['id_users'], $row['per_contact'], $row['address'], $row['phonenumber'], $row['description'], $row['logo'], $row['build_date'], $row['name_company']);
            }
            return $data;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}

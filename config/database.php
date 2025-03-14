<?php

require_once "constants.php";
session_start();

class DB {

    public $db;


    public function get_connection(){
        $this->db = null;
        $this->db = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_errno) {
            die("Database connection failed" . $this->db->connect_error);
        }

        return $this->db;
    }

    public function query($sql){

        $result = $this->db->query($sql);

        $this->confirm_query($result);

        return $result;
    }

    private function confirm_query($result) {

        if(!$result){
            die("Query failed" . $this->db->error);
        }

    }
    public function affected_rows(){
        return mysqli_affected_rows($this->db);
    }

    public function escape_string($string) {

        $escape_string = $this->db->real_escape_string($string);
        return $escape_string;

    }
}





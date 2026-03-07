<?php

class Database {

    private $host = "localhost";
    private $db = "career_explorer";
    private $user = "root";
    private $pass = "";

    public function connect() {

        $conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db
        );

        if ($conn->connect_error) {
            die("Connection failed");
        }

        return $conn;
    }
}
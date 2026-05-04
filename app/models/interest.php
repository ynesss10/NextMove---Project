<?php

require_once __DIR__ . '/../config/database.php';

class Interest {
    private $conn;
    private $table = 'interests';

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->conn->query($sql);
        
        if (!$result) {
            return [];
        }

        $interests = [];
        while ($row = $result->fetch_assoc()) {
            $interests[] = $row;
        }

        return $interests;
    }

    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";
        $result = $this->conn->query($sql);
        
        if (!$result) {
            return null;
        }

        return $result->fetch_assoc();
    }
}

?>

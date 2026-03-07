<?php

require_once __DIR__ . '/../config/database.php';

class Career {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function matchCareer($interest, $skill)
    {
        $sql = "SELECT * FROM careers
                WHERE interest_id = ?
                AND skill_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $interest, $skill);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getCareerById($id)
    {
        $sql = "SELECT * FROM careers WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}
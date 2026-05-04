<?php

require_once __DIR__ . '/../config/database.php';

class Career {
    private $conn;
    private $table = 'careers';

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

        $careers = [];
        while ($row = $result->fetch_assoc()) {
            $careers[] = $row;
        }

        return $careers;
    }

    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";
        $result = $this->conn->query($sql);
        
        if (!$result) {
            return null;
        }

        return $result->fetch_assoc();
    }

    public function getByInterestAndSkill($interestId, $skillId) {
        $sql = "SELECT * FROM {$this->table} WHERE interest_id = {$interestId} AND skill_id = {$skillId}";
        $result = $this->conn->query($sql);
        
        if (!$result) {
            return [];
        }

        $careers = [];
        while ($row = $result->fetch_assoc()) {
            $careers[] = $row;
        }

        return $careers;
    }

    public function getSkillsByInterest($interestId, $limit = 3) {
        $sql = "SELECT DISTINCT s.id, s.name, s.description FROM skills s " .
               "JOIN {$this->table} c ON c.skill_id = s.id " .
               "WHERE c.interest_id = {$interestId} LIMIT {$limit}";
        $result = $this->conn->query($sql);
        
        if (!$result) {
            return [];
        }

        $skills = [];
        while ($row = $result->fetch_assoc()) {
            $skills[] = $row;
        }

        return $skills;
    }

    public function getByInterest($interestId) {
        $sql = "SELECT * FROM {$this->table} WHERE interest_id = {$interestId}";
        $result = $this->conn->query($sql);
        
        if (!$result) {
            return [];
        }

        $careers = [];
        while ($row = $result->fetch_assoc()) {
            $careers[] = $row;
        }

        return $careers;
    }

    public function getBySkill($skillId) {
        $sql = "SELECT * FROM {$this->table} WHERE skill_id = {$skillId}";
        $result = $this->conn->query($sql);
        
        if (!$result) {
            return [];
        }

        $careers = [];
        while ($row = $result->fetch_assoc()) {
            $careers[] = $row;
        }

        return $careers;
    }
}

?>

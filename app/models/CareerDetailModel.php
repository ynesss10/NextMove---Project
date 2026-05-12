<?php

namespace App\Models;

require_once __DIR__ . '/../config/database.php';

class CareerDetailModel {
    private $conn;

    public function __construct() {
        $db = new \Database();
        $this->conn = $db->connect();
    }

    public function getCareerById($id) {
        $stmt = $this->conn->prepare(
            "SELECT c.*, i.name AS bidang, s.name AS skill_name " .
            "FROM careers c " .
            "JOIN interests i ON c.interest_id = i.id " .
            "JOIN skills s ON c.skill_id = s.id " .
            "WHERE c.id = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getCareerByName($name) {
        $stmt = $this->conn->prepare(
            "SELECT c.*, i.name AS bidang, s.name AS skill_name " .
            "FROM careers c " .
            "JOIN interests i ON c.interest_id = i.id " .
            "JOIN skills s ON c.skill_id = s.id " .
            "WHERE c.name = ?"
        );
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getCareerSkills($career_id) {
        $stmt = $this->conn->prepare("SELECT * FROM career_req_skills WHERE career_id = ?");
        $stmt->bind_param("i", $career_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $skills = [];
        while($row = $result->fetch_assoc()) {
            $skills[] = $row;
        }
        return $skills;
    }

    public function getCareerEducations($career_id) {
        $stmt = $this->conn->prepare("SELECT * FROM career_educations WHERE career_id = ?");
        $stmt->bind_param("i", $career_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $educations = [];
        while($row = $result->fetch_assoc()) {
            $educations[] = $row;
        }
        return $educations;
    }
}
?>

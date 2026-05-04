<?php
namespace App\Controllers;

class SkillController
{
    public function skill()
    {
        if (!isset($_SESSION['user_name'])) {
            header('Location: /logins');
            exit;
        }

        if (!isset($_SESSION['selected_interest'])) {
            header('Location: /interests');
            exit;
        }

        require_once '../app/models/Career.php';
        require_once '../app/models/Interest.php';

        $careerModel = new \Career();
        $interestModel = new \Interest();

        $interestId = $_SESSION['selected_interest'];
        $interest = $interestModel->getById($interestId);
        $skills = $careerModel->getSkillsByInterest($interestId, 3);

        require_once '../app/models/Skill.php';
        $skillModel = new \Skill();
        $allSkills = $skillModel->getAll();

        $selectedIds = array_column($skills, 'id');
        foreach ($allSkills as $skillItem) {
            if (count($skills) >= 3) {
                break;
            }
            if (!in_array($skillItem['id'], $selectedIds, true)) {
                $skills[] = $skillItem;
                $selectedIds[] = $skillItem['id'];
            }
        }

        if (count($skills) > 3) {
            $skills = array_slice($skills, 0, 3);
        }

        require_once '../app/views/skills/skill.php';
    }

    public function saveSkill()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Content-Type: application/json');
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($data['skill_id'])) {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Skill ID is required']);
                exit;
            }

            $_SESSION['selected_skill'] = $data['skill_id'];

            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Skill saved']);
            exit;
        }

        header('Content-Type: application/json');
        http_response_code(405);
        echo json_encode(['success' => false, 'message' => 'Method not allowed']);
        exit;
    }
}

?>
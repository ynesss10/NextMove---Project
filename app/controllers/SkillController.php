<?php
namespace App\Controllers;

class SkillController
{
    public function skill()
    {
        if (!isset($_SESSION['user_name'])) {
            header('Location: /login');
            exit;
        }

        if (!isset($_SESSION['selected_interest'])) {
            header('Location: /interest');
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

        require_once '../app/views/skill.php';
    }

    public function saveSkill()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['skill_id'])) {
                header('Location: /skill');
                exit;
            }

            $_SESSION['selected_skill'] = $_POST['skill_id'];
            header('Location: /result');
            exit;
        }

        header('Location: /skill');
        exit;
    }
}

?>
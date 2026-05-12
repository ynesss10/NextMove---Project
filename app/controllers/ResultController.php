<?php
namespace App\Controllers;

class ResultController
{
    public function result()
    {
        if (!isset($_SESSION['user_name'])) {
            header('Location: /login');
            exit;
        }

        if (!isset($_SESSION['selected_interest']) || !isset($_SESSION['selected_skill'])) {
            header('Location: /interest');
            exit;
        }

        require_once '../app/models/Career.php';
        require_once '../app/models/Interest.php';
        require_once '../app/models/Skill.php';

        $careerModel = new \Career();
        $interestModel = new \Interest();
        $skillModel = new \Skill();

        $interestId = $_SESSION['selected_interest'];
        $skillId = $_SESSION['selected_skill'];

        $careers = $careerModel->getByInterestAndSkill($interestId, $skillId, 2);
        $matchType = 'exact';
        $exactCount = count($careers);

        if ($exactCount < 2) {
            $existingIds = array_column($careers, 'id');
            $needed = 2 - $exactCount;

            $interestFill = $careerModel->getByInterest($interestId, $needed, $existingIds);
            if (!empty($interestFill)) {
                if ($exactCount === 0) {
                    $matchType = 'interest';
                } elseif ($exactCount < 2) {
                    $matchType = 'mixed';
                }
                $careers = array_merge($careers, $interestFill);
            }
        }

        if (count($careers) < 2) {
            $existingIds = array_column($careers, 'id');
            $needed = 2 - count($careers);
            $skillFill = $careerModel->getBySkill($skillId, $needed, $existingIds);

            if (!empty($skillFill) && empty($careers)) {
                $matchType = 'skill';
            } elseif (!empty($skillFill) && $matchType === 'exact') {
                $matchType = 'mixed';
            }

            if (!empty($skillFill)) {
                $careers = array_merge($careers, $skillFill);
            }
        }

        if (!empty($careers)) {
            $uniqueCareers = [];
            $seenIds = [];
            foreach ($careers as $career) {
                if (!in_array($career['id'], $seenIds, true)) {
                    $seenIds[] = $career['id'];
                    $uniqueCareers[] = $career;
                }
            }
            $careers = array_slice($uniqueCareers, 0, 2);
        }

        if (empty($careers)) {
            $matchType = 'none';
        }

        $interest = $interestModel->getById($interestId);
        $skill = $skillModel->getById($skillId);

        require_once '../app/views/result.php';
    }
}

?>
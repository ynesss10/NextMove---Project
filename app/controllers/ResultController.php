<?php
namespace App\Controllers;

class ResultController
{
    public function result()
    {
        if (!isset($_SESSION['user_name'])) {
            header('Location: /logins');
            exit;
        }

        if (!isset($_SESSION['selected_interest']) || !isset($_SESSION['selected_skill'])) {
            header('Location: /interests');
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

        $careers = $careerModel->getByInterestAndSkill($interestId, $skillId);
        $matchType = 'exact';

        if (empty($careers)) {
            $careers = $careerModel->getByInterest($interestId);
            $matchType = 'interest';
        }

        if (empty($careers)) {
            $careers = $careerModel->getBySkill($skillId);
            $matchType = 'skill';
        }

        $interest = $interestModel->getById($interestId);
        $skill = $skillModel->getById($skillId);

        require_once '../app/views/results/result.php';
    }
}

?>
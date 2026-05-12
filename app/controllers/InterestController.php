<?php
namespace App\Controllers;

class InterestController
{
    public function interest()
    {
        if (!isset($_SESSION['user_name'])) {
            header('Location: /login');
            exit;
        }

        require_once '../app/models/Interest.php';
        $interestModel = new \Interest();
        $interests = $interestModel->getAll();

        require_once '../app/views/interest.php';
    }

    public function saveInterest()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['interest_id'])) {
                header('Location: /interest');
                exit;
            }

            $_SESSION['selected_interest'] = $_POST['interest_id'];
            header('Location: /skill');
            exit;
        }

        header('Location: /interest');
        exit;
    }
}

?>
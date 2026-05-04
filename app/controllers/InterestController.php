<?php
namespace App\Controllers;

class InterestController
{
    public function interest()
    {
        if (!isset($_SESSION['user_name'])) {
            header('Location: /logins');
            exit;
        }

        require_once '../app/models/Interest.php';
        $interestModel = new \Interest();
        $interests = $interestModel->getAll();

        require_once '../app/views/interests/interest.php';
    }

    public function saveInterest()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Content-Type: application/json');
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($data['interest_id'])) {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Interest ID is required']);
                exit;
            }

            $_SESSION['selected_interest'] = $data['interest_id'];

            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Interest saved']);
            exit;
        }

        header('Content-Type: application/json');
        http_response_code(405);
        echo json_encode(['success' => false, 'message' => 'Method not allowed']);
        exit;
    }
}

?>
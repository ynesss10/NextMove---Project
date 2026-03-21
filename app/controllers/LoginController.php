<?php
namespace App\Controllers;

class LoginController
{
    public function login()
    {
        require_once '../app/views/logins/login.php';
    }

    public function authenticate()
    {
        header('Content-Type: application/json');
        
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Format data tidak valid']);
            return;
        }

        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';

        if (empty($email) || empty($password)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Email dan password harus diisi']);
            return;
        }

        require_once '../app/models/User.php';
        $userModel = new \User();
        $user = $userModel->getByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            
            echo json_encode(['success' => true, 'message' => 'Login berhasil']);
        } else {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Email atau password salah']);
        }
    }
}

?>
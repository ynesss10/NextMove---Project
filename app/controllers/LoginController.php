<?php
namespace App\Controllers;

class LoginController
{
    public function login()
    {
        require_once '../app/views/login.php';
    }

    public function authenticate()
    {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $errorMessage = '';

        if (empty($email) || empty($password)) {
            $errorMessage = 'Email dan password harus diisi';
            require_once '../app/views/login.php';
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = 'Format email tidak valid';
            require_once '../app/views/login.php';
            return;
        }

        require_once '../app/models/User.php';
        $userModel = new \User();
        $user = $userModel->getByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            header('Location: /');
            exit;
        }

        $errorMessage = 'Email atau password salah';
        require_once '../app/views/login.php';
    }

    public function apiLogin()
    {
        header('Content-Type: application/json');
        
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($email) || empty($password)) {
            echo json_encode([
                'success' => false,
                'message' => 'Email dan password harus diisi'
            ]);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode([
                'success' => false,
                'message' => 'Format email tidak valid'
            ]);
            return;
        }

        require_once '../app/models/User.php';
        $userModel = new \User();
        $user = $userModel->getByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            echo json_encode([
                'success' => true,
                'message' => 'Login berhasil',
                'redirect' => '/'
            ]);
            return;
        }

        echo json_encode([
            'success' => false,
            'message' => 'Email atau password salah'
        ]);
    }
}
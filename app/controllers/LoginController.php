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
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $errorMessage = '';

        if (empty($email) || empty($password)) {
            $errorMessage = 'Email dan password harus diisi';
            require_once '../app/views/logins/login.php';
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
        require_once '../app/views/logins/login.php';
    }
}

?>
<?php
namespace App\Controllers;

class RegisterController
{
    public function register()
    {
        require_once '../app/views/registers/register.php';
    }

    public function store()
    {
        $fullname = trim($_POST['fullname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        $errorMessage = '';

        if (empty($fullname) || empty($email) || empty($password)) {
            $errorMessage = 'Semua kolom harus diisi';
        } elseif ($password !== $confirm_password) {
            $errorMessage = 'Password tidak cocok';
        }

        if ($errorMessage !== '') {
            require_once '../app/views/registers/register.php';
            return;
        }

        require_once '../app/models/User.php';
        $userModel = new \User();

        if ($userModel->checkExists($fullname, $email)) {
            $errorMessage = 'Username atau Email sudah terdaftar';
            require_once '../app/views/registers/register.php';
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userId = $userModel->create($fullname, $email, $hashedPassword);

        if ($userId) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_name'] = $fullname;
            header('Location: /');
            exit;
        }

        $errorMessage = 'Gagal menyimpan ke database';
        require_once '../app/views/registers/register.php';
    }
}

?>
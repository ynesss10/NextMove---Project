<?php
namespace App\Controllers;

class RegisterController
{
    public function register()
    {
        require_once '../app/views/register.php';
    }

    public function store()
    {
        $fullname = trim($_POST['fullname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        $errorMessage = '';

        if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password)) {
            $errorMessage = 'Semua kolom harus diisi';
        } elseif (strlen($fullname) < 3) {
            $errorMessage = 'Nama lengkap minimal 3 karakter';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = 'Format email tidak valid';
        } elseif ($password !== $confirm_password) {
            $errorMessage = 'Password tidak cocok';
        }

        if ($errorMessage !== '') {
            require_once '../app/views/register.php';
            return;
        }

        require_once '../app/models/User.php';
        $userModel = new \User();

        if ($userModel->checkExists($fullname, $email)) {
            $errorMessage = 'Username atau Email sudah terdaftar';
            require_once '../app/views/register.php';
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
        require_once '../app/views/register.php';
    }

    public function apiRegister()
    {
        header('Content-Type: application/json');
        
        $fullname = trim($_POST['fullname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password)) {
            echo json_encode([
                'success' => false,
                'message' => 'Semua kolom harus diisi'
            ]);
            return;
        }

        if (strlen($fullname) < 3) {
            echo json_encode([
                'success' => false,
                'message' => 'Nama lengkap minimal 3 karakter'
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

        if ($password !== $confirm_password) {
            echo json_encode([
                'success' => false,
                'message' => 'Password tidak cocok'
            ]);
            return;
        }

        require_once '../app/models/User.php';
        $userModel = new \User();

        if ($userModel->checkExists($fullname, $email)) {
            echo json_encode([
                'success' => false,
                'message' => 'Username atau Email sudah terdaftar'
            ]);
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userId = $userModel->create($fullname, $email, $hashedPassword);

        if ($userId) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_name'] = $fullname;
            echo json_encode([
                'success' => true,
                'message' => 'Registrasi berhasil',
                'redirect' => '/'
            ]);
            return;
        }

        echo json_encode([
            'success' => false,
            'message' => 'Gagal menyimpan ke database'
        ]);
    }
}
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
        header('Content-Type: application/json');
        
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Format data tidak valid']);
            return;
        }

        $fullname = trim($data['fullname'] ?? '');
        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';
        $confirm_password = $data['confirm_password'] ?? '';

        if (empty($fullname) || empty($email) || empty($password)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Semua kolom harus diisi']);
            return;
        }

        if ($password !== $confirm_password) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Password tidak cocok']);
            return;
        }

        require_once '../app/models/User.php';
        $userModel = new \User();

        if ($userModel->checkExists($fullname, $email)) {
            http_response_code(409);
            echo json_encode(['success' => false, 'message' => 'Username atau Email sudah terdaftar']);
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userId = $userModel->create($fullname, $email, $hashedPassword);
        
        if ($userId) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_name'] = $fullname;
            echo json_encode(['success' => true, 'message' => 'Registrasi berhasil']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Gagal menyimpan ke database']);
        }
    }
}

?>
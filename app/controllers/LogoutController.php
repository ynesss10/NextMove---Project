<?php
namespace App\Controllers;

class LogoutController {
    public function logout() {
        session_unset();
        session_destroy();
        
        header('Location: /');
        exit;
    }

    public function apiLogout()
    {
        header('Content-Type: application/json');
        
        session_unset();
        session_destroy();
        
        echo json_encode([
            'success' => true,
            'message' => 'Logout berhasil',
            'redirect' => '/'
        ]);
    }
}
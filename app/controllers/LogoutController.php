<?php
namespace App\Controllers;

class LogoutController {
    public function logout() {
        session_unset();
        session_destroy();
        
        header('Location: ' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/');
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
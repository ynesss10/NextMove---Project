<?php
namespace App\Controllers;

class SaveController
{
    public function save()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        
        require_once '../app/views/save.php';
    }
}

?>
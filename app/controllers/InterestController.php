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
        require_once '../app/views/interests/interest.php';
    }
}

?>
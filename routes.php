<?php

$url = $_GET['url'] ?? 'home';

switch ($url) {

    case 'home':

        require "app/controllers/HomeController.php";
        $controller = new HomeController();
        $controller->index();

        break;


    case 'match/interest':

        require "app/controllers/MatchController.php";
        $controller = new MatchController();
        $controller->interest();

        break;


    case 'match/skill':

        require "app/controllers/MatchController.php";
        $controller = new MatchController();
        $controller->skill();

        break;


    case 'match/result':

        require "app/controllers/MatchController.php";
        $controller = new MatchController();
        $controller->result();

        break;


    case 'career/detail':

        require "app/controllers/CareerController.php";
        $controller = new CareerController();
        $controller->detail($_GET['id']);

        break;

}
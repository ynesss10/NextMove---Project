<?php

require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

$router->add('GET', '/', 'PageController', 'home');

$router->run();
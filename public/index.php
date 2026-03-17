<?php
require_once '../app/core/Router.php';
use App\Core\Router;


$router = new Router();

// Register Route

// Landing Page
$router->add('GET', '/', 'LandingController', 'landingView');

// Interest
$router->add('GET', '/interests', 'InterestController', 'index');

// Daftar => index
// Tambah => create
// Edit => edit
// Detail => show

// Skill
$router->add('GET', '/skills', 'SkillController', 'index');

// Result



$router->run();

?>
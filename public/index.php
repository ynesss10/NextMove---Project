<?php
require_once '../app/core/Router.php';
use App\Core\Router;


$router = new Router();

// Register Route

// Landing Page
$router->add('GET', '/', 'LandingController', 'landingView');

// Interest
$router->add('GET', '/interests', 'InterestController', 'interest');

// Daftar => index
// Tambah => create
// Edit => edit
// Detail => show

// Skill
$router->add('GET', '/skills', 'SkillController', 'skill');

// Result
$router->add('GET', '/results', 'ResultController', 'result');

$router->add('GET', '/registers', 'RegisterController', 'register');

$router->add('GET', '/logins', 'LoginController', 'login');

$router->add('GET', '/details', 'DetailController', 'detail');

$router->run();

?>
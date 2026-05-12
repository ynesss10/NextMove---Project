<?php
session_start();
require_once '../app/core/Router.php';
use App\Core\Router;


$router = new Router();

// Register Route

// Landing Page
$router->add('GET', '/', 'LandingController', 'landingView');
$router->add('GET', '/logout', 'LogoutController', 'logout');

// Interest
$router->add('GET', '/interest', 'InterestController', 'interest');
$router->add('POST', '/interest/save', 'InterestController', 'saveInterest');

// Daftar => index
// Tambah => create
// Edit => edit
// Detail => show

// Skill
$router->add('GET', '/skill', 'SkillController', 'skill');
$router->add('POST', '/skill/save', 'SkillController', 'saveSkill');

// Result
$router->add('GET', '/result', 'ResultController', 'result');

$router->add('GET', '/login', 'LoginController', 'login');
$router->add('POST', '/login', 'LoginController', 'authenticate');

$router->add('GET', '/register', 'RegisterController', 'register');
$router->add('POST', '/register', 'RegisterController', 'store');

$router->add('GET', '/detail', 'DetailController', 'detail');

$router->add('GET', '/saved', 'SaveController', 'save');

$router->run();

?>
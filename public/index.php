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
$router->add('GET', '/interests', 'InterestController', 'interest');
$router->add('POST', '/interest/save', 'InterestController', 'saveInterest');

// Daftar => index
// Tambah => create
// Edit => edit
// Detail => show

// Skill
$router->add('GET', '/skills', 'SkillController', 'skill');
$router->add('POST', '/skill/save', 'SkillController', 'saveSkill');

// Result
$router->add('GET', '/results', 'ResultController', 'result');

$router->add('GET', '/logins', 'LoginController', 'login');
$router->add('POST', '/logins', 'LoginController', 'authenticate');

$router->add('GET', '/registers', 'RegisterController', 'register');
$router->add('POST', '/registers', 'RegisterController', 'store');

$router->add('GET', '/details', 'DetailController', 'detail');

$router->add('GET', '/saved', 'SaveController', 'save');

$router->run();

?>
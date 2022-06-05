<?php
require_once '../vendor/autoload.php';
require_once '../packages/BezghinovaDev/framework/src/functions.php';

//spl_autoload_register(function ($class){
//    $file = '/var/www/html' . '/' . str_replace('\\', '/', $class) . '.php';
//    if (is_file($file)){
//        require_once $file;
//    }
//});

// Laravel 7.0+
//Route::add('/user', ['\App\Controllers\CategoryController', 'index']); // error 404
//Route::add('/user', ['\App\Controllers\CategoryController']); // error 404

define('URL', trim($_SERVER['REQUEST_URI'], '/'));
define('ROOT', dirname(__DIR__));
define('SERVER', str_replace('public', '', dirname(__DIR__)));

use BezghinovaDev\Framework\Router;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(SERVER .'/.env');

require_once '../routes/web.php';

Router::dispatch(URL);

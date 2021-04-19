<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

use app\Router;
use app\controllers\ProductController;

require_once __DIR__.'/../vendor/autoload.php';

$router = new Router();

$router->get('/',[ProductController::class, 'index']);
$router->get('/products',[ProductController::class, 'index']);

$router->get('/product/create',[ProductController::class, 'create']);
$router->post('/product/create',[ProductController::class, 'create']);

$router->get('/product/update',[ProductController::class, 'update']);
$router->post('/product/update',[ProductController::class, 'update']);

$router->post('/product/delete',[ProductController::class, 'delete']);

$router->resolve();

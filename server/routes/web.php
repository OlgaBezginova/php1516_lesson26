<?php
use BezghinovaDev\Framework\Router;

Router::add('^$',         [App\Controllers\MainController::class,     'index']);
Router::add('^category$', [App\Controllers\CategoryController::class, 'index']);
Router::add('article',    [App\Controllers\ArticleController::class,  'index']);


//Router::add('^$', [
//    'controller' => 'App\Controllers\MainController',
//    'action' => 'index',
//]);
//Router::add('^category$', [
//    'controller' => 'App\Controllers\CategoryController',
//    'action' => 'index'
//]);
//Router::add('article', [
//    'controller' => 'App\Controllers\ArticleController',
//    'action' => 'index'
//]);
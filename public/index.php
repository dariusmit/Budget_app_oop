<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', dirname(__DIR__, 1) . '/src/storage/');

$request = $_SERVER['REQUEST_URI'];

$router = new Drago\Mvc1\Router();
$router->route($request);

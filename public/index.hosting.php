<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// IMPORTANT: Ajustati calea de mai jos dupa structura de pe server
// Exemplu: daca app-ul e in /home/utilizator/piscineromania/
// si public_html/ e /home/utilizator/public_html/
// atunci calea este: __DIR__.'/../piscineromania'

$appPath = __DIR__.'/../piscineromania';

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = $appPath.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require $appPath.'/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once $appPath.'/bootstrap/app.php';

$app->handleRequest(Request::capture());

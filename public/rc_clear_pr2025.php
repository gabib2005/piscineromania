<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('LARAVEL_START', microtime(true));
try {
    require __DIR__.'/../vendor/autoload.php';
    $app = require __DIR__.'/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->call('view:clear');
    $kernel->call('cache:clear');
    $kernel->call('config:clear');
    $kernel->call('route:clear');
    echo 'Route cache cleared OK! ' . date('H:i:s');
} catch (\Throwable $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

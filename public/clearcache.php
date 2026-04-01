<?php
define('LARAVEL_START', microtime(true));
require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->call('view:clear');
$kernel->call('cache:clear');
$kernel->call('config:clear');
echo 'Cache cleared OK!';

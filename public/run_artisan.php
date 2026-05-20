<?php
// ⚠️ DELETE AFTER USE!

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';  // ← notice ../

$app = require_once __DIR__.'/../bootstrap/app.php';  // ← notice ../

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$command = 'migrate';
$params  = ['--force' => true];

$status = $kernel->call($command, $params);

echo "<pre>" . $kernel->output() . "</pre>";
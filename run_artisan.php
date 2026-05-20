<?php
// ⚠️ DELETE THIS FILE AFTER USE!

define('LARAVEL_START', microtime(true));

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// ↓↓ CHANGE THIS COMMAND ↓↓
$command = 'migrate';
$params  = ['--force' => true];

$status = $kernel->call($command, $params);

echo "<pre>" . $kernel->output() . "</pre>";

// $command = 'migrate';
// $params  = ['--force' => true];
// // visit URL → then change to:

// $command = 'db:seed';
// $params  = ['--force' => true];
// visit URL again
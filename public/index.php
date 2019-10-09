<?php
require __DIR__.'/../vendor/autoload.php';
define('APP_DIR', __DIR__.'/..');

$app = new App\Application();

$response = $app->run();

$response->send();

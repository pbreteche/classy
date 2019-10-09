<?php
require __DIR__.'/../vendor/autoload.php';

$app = new App\Application();

$response = $app->run();

$response->send();

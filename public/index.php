<?php

require_once '../src/Response.php';
require_once '../src/UrlReader.php';

// regarder dans l'url
$reader = new UrlReader();

$id = $reader->parse();

$response = new Response();

$response->send();

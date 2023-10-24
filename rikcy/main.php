<?php
require __DIR__ . '/Application.php';
require __DIR__ . '/VideoStore.php';
require_once 'Video.php';

use rikcy\Application;

$app = new Application();
$app->run();

<?php

session_start();

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/bootstrap.php';

$kernel->initRoutes($config->getRoute());

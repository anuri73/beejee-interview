<?php

use App\Config\Config;
use App\Config\RouteConfig;
use App\Config\RouteConfigItem;
use App\Controller\HomeController;
use App\Kernel;
use Tightenco\Collect\Support\Collection;

require dirname(__DIR__) . '/vendor/autoload.php';

$kernel = new Kernel();
$config = new Config();
$config->route = new RouteConfig(new Collection([
    new RouteConfigItem(
        'GET',
        '/',
        [new HomeController(), 'index']
    )
]));
$kernel->init($config);

<?php

use App\Config\Config;
use App\Config\DBConfig;
use App\Config\RouteConfig;
use App\Config\RouteConfigItem;
use App\Controller\HomeController;
use App\Core\Model;
use App\Core\View;
use App\Kernel;
use Tightenco\Collect\Support\Collection;

$kernel = new Kernel();

$config = new Config();
$config->db = new DBConfig();

$model = new Model($kernel->initDB($config->db));

$config->route = new RouteConfig(new Collection([
    new RouteConfigItem(
        'GET',
        '/',
        [new HomeController(new View(), $model), 'index']
    )
]));

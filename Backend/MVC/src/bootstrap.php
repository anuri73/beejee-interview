<?php

use App\Config\Config;
use App\Config\DBConfig;
use App\Config\RouteConfig;
use App\Config\RouteConfigItem;
use App\Controller\BookController;
use App\Controller\HomeController;
use App\Core\Model;
use App\Core\View;
use App\Kernel;
use Tightenco\Collect\Support\Collection;

$kernel = new Kernel();

$config = new Config();
$config->db = new DBConfig();

$model = new Model($kernel->initDB($config->db));

$view = new View();

$config->route = new RouteConfig(new Collection([
    new RouteConfigItem(
        'GET',
        '/',
        [new HomeController($view, $model), 'index']
    ),
    new RouteConfigItem(
        'GET',
        '/books',
        [new BookController($view, $model), 'list']
    ),
    new RouteConfigItem(
        'GET',
        '/book/:id',
        [new BookController($view, $model), 'view']
    ),
    new RouteConfigItem(
        'GET',
        '/book/create',
        [new BookController($view, $model), 'create']
    ),
    new RouteConfigItem(
        'POST',
        '/book/add',
        [new BookController($view, $model), 'add']
    ),
    new RouteConfigItem(
        'GET',
        '/book/update/:id',
        [new BookController($view, $model), 'update']
    ),
    new RouteConfigItem(
        'POST',
        '/book/update/:id',
        [new BookController($view, $model), 'update']
    ),
    new RouteConfigItem(
        'DELETE',
        '/book/delete/:id',
        [new BookController($view, $model), 'delete']
    ),
]));

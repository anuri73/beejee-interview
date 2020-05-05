<?php

use App\Config\Config;
use App\Config\RouteConfig;
use App\Config\RouteConfigItem;
use App\Controller\HomeController;
use App\Kernel;
use Tightenco\Collect\Support\Collection;

$kernel = new Kernel();

$config = new Config();

$taskController = $kernel->container->get('app.task_controller');

$config->route = new RouteConfig(new Collection([
    new RouteConfigItem(
        'GET',
        '/',
        [new HomeController(
            $kernel->container->get('core.view'),
            $kernel->container->get('core.model')
        ), 'index']
    ),
    new RouteConfigItem(
        'GET',
        '/tasks',
        [$taskController, 'list']
    ),
    new RouteConfigItem(
        'GET',
        '/task/:id',
        [$taskController, 'view']
    ),
    new RouteConfigItem(
        'GET',
        '/task/create',
        [$taskController, 'create']
    ),
    new RouteConfigItem(
        'POST',
        '/task/add',
        [$taskController, 'add']
    ),
    new RouteConfigItem(
        'GET',
        '/task/update/[i:id]',
        [$taskController, 'update']
    ),
    new RouteConfigItem(
        'POST',
        '/task/edit/[i:id]',
        [$taskController, 'edit']
    ),
    new RouteConfigItem(
        'DELETE',
        '/task/delete/:id',
        [$taskController, 'delete']
    ),
]));

<?php

use App\Config\Config;
use App\Config\RouteConfig;
use App\Config\RouteConfigItem;
use App\Kernel;
use Tightenco\Collect\Support\Collection;

$kernel = new Kernel();

$config = new Config();

$taskController = $kernel->getContainer()->get('app.task_controller');
$authController = $kernel->getContainer()->get('app.auth_controller');

$config->setRoute(new RouteConfig(new Collection([
    new RouteConfigItem(
        'GET',
        '/',
        [$taskController, 'list']
    ),
    new RouteConfigItem(
        'GET',
        '/tasks',
        [$taskController, 'list']
    ),
    new RouteConfigItem(
        'GET',
        '/task/create',
        [$taskController, 'create']
    ),
    new RouteConfigItem(
        'POST',
        '/task/create',
        [$taskController, 'create']
    ),
    new RouteConfigItem(
        'GET',
        '/task/update/[i:id]',
        [$taskController, 'update']
    ),
    new RouteConfigItem(
        'POST',
        '/task/update/[i:id]',
        [$taskController, 'update']
    ),
    new RouteConfigItem(
        'GET',
        '/auth',
        [$authController, 'loginPage']
    ),
    new RouteConfigItem(
        'POST',
        '/auth/login',
        [$authController, 'login']
    ),
    new RouteConfigItem(
        'GET',
        '/logout',
        [$authController, 'logout']
    ),
])));

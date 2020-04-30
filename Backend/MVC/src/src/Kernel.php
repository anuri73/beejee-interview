<?php

namespace App;

use App\Config\Config;
use App\Config\IRouteConfig;
use Klein\Klein;

class Kernel
{
    function init(Config $config)
    {
        $this->initRoutes($config->route);
    }

    function initRoutes(IRouteConfig $config)
    {
        $klein = new Klein();

        foreach ($config->getRoutes() as $route) {
            $klein->respond($route->getMethod(), $route->getPath(), $route->getCallback());
        }
        $klein->dispatch();
    }
}

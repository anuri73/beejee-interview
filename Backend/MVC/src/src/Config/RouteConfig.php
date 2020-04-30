<?php

namespace App\Config;

use Tightenco\Collect\Support\Collection;
use Tightenco\Collect\Support\Enumerable;

class RouteConfig implements IRouteConfig
{
    private Collection $routes;

    public function __construct(?Collection $routes = null)
    {
        $this->routes = empty($routes) ? new Collection() : $routes;
    }

    function setRoutes(Collection $routes)
    {
        foreach ($routes as $route) {
            $this->addRoute($route);
        }
    }

    function addRoute(IRouteConfigItem $configItem)
    {
        $this->routes->add($configItem);
    }

    function getRoutes(): Enumerable
    {
        return $this->routes;
    }
}


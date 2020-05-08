<?php

namespace App\Config;

use Tightenco\Collect\Support\Collection;
use Tightenco\Collect\Support\Enumerable;

class RouteConfig implements IRouteConfig
{
    /**
     * @var Collection
     */
    private $routes;

    public function __construct(?Collection $routes = null)
    {
        $this->routes = empty($routes) ? new Collection() : $routes;
    }

    public function setRoutes(Collection $routes)
    {
        foreach ($routes as $route) {
            $this->addRoute($route);
        }
    }

    public function addRoute(IRouteConfigItem $configItem)
    {
        $this->routes->add($configItem);
    }

    public function getRoutes(): Enumerable
    {
        return $this->routes;
    }
}

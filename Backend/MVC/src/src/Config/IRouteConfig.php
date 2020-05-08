<?php

namespace App\Config;

use Tightenco\Collect\Support\Enumerable;

interface IRouteConfig
{
    /**
     * @return Enumerable|IRouteConfigItem[]
     */
    public function getRoutes(): Enumerable;
}

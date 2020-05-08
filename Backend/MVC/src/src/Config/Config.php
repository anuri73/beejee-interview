<?php

namespace App\Config;

class Config
{
    /**
     * @var null|RouteConfig $route
     */
    private $route;
    /**
     * @var IDBConfig $db
     */
    private $db;

    /**
     * @return RouteConfig|null
     */
    public function getRoute(): ?RouteConfig
    {
        return $this->route;
    }

    /**
     * @param RouteConfig|null $route
     * @return Config
     */
    public function setRoute(?RouteConfig $route): Config
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return IDBConfig
     */
    public function getDb(): IDBConfig
    {
        return $this->db;
    }

    /**
     * @param IDBConfig $db
     * @return Config
     */
    public function setDb(IDBConfig $db): Config
    {
        $this->db = $db;
        return $this;
    }
}

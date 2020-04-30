<?php

namespace App\Config;

class RouteConfigItem implements IRouteConfigItem
{
    public string $method;
    public string $path;
    public array $callback;

    public function __construct(string $method, string $path, array $callback)
    {
        $this->setMethod($method);
        $this->setPath($path);
        $this->setCallback($callback);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return RouteConfigItem
     */
    public function setMethod(string $method): RouteConfigItem
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return RouteConfigItem
     */
    public function setPath(string $path): RouteConfigItem
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return array
     */
    public function getCallback(): array
    {
        return $this->callback;
    }

    /**
     * @param array $callback
     * @return RouteConfigItem
     */
    public function setCallback(array $callback): RouteConfigItem
    {
        $this->callback = $callback;
        return $this;
    }
}

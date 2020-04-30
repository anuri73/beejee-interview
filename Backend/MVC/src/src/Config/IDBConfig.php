<?php

namespace App\Config;

use Doctrine\Common\Cache\Cache;

interface IDBConfig
{
    /**
     * @return bool
     */
    public function isDevMode(): bool;

    /**
     * @return string|null
     */
    public function getProxyDir(): ?string;

    /**
     * @return Cache
     */
    public function getCache(): ?Cache;

    /**
     * @return bool
     */
    public function isUseSimpleAnnotationReader(): bool;

    /**
     * @return string
     */
    public function getConnectionString(): string;
}

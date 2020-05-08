<?php

namespace App\Config;

use Doctrine\Common\Cache\Cache;

class DBConfig implements IDBConfig
{
    /**
     * @var bool
     */
    private $isDevMode = true;
    /**
     * @var string|null
     */
    private $proxyDir = null;
    /**
     * @var Cache|null
     */
    private $cache = null;
    /**
     * @var bool
     */
    private $useSimpleAnnotationReader = false;
    /**
     * @var string
     */
    private $connectionString = 'pgsql://mvc:eNjS98AGUIocPV92dsIp8Zok3xfqyDjj@postgres:5432/mvc';

    /**
     * @return bool
     */
    public function isDevMode(): bool
    {
        return $this->isDevMode;
    }

    /**
     * @param bool $isDevMode
     * @return DBConfig
     */
    public function setIsDevMode(bool $isDevMode): DBConfig
    {
        $this->isDevMode = $isDevMode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProxyDir(): ?string
    {
        return $this->proxyDir;
    }

    /**
     * @param string|null $proxyDir
     * @return DBConfig
     */
    public function setProxyDir(?string $proxyDir): DBConfig
    {
        $this->proxyDir = $proxyDir;
        return $this;
    }

    /**
     * @return Cache|null
     */
    public function getCache(): ?Cache
    {
        return $this->cache;
    }

    /**
     * @param Cache|null $cache
     * @return DBConfig
     */
    public function setCache(?Cache $cache): DBConfig
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseSimpleAnnotationReader(): bool
    {
        return $this->useSimpleAnnotationReader;
    }

    /**
     * @param bool $useSimpleAnnotationReader
     * @return DBConfig
     */
    public function setUseSimpleAnnotationReader(bool $useSimpleAnnotationReader): DBConfig
    {
        $this->useSimpleAnnotationReader = $useSimpleAnnotationReader;
        return $this;
    }

    /**
     * @return string
     */
    public function getConnectionString(): string
    {
        return $this->connectionString;
    }

    /**
     * @param string $connectionString
     * @return DBConfig
     */
    public function setConnectionString(string $connectionString): DBConfig
    {
        $this->connectionString = $connectionString;
        return $this;
    }
}

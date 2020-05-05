<?php

namespace App;

use App\Config\IDBConfig;
use App\Config\IRouteConfig;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Klein\Klein;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class Kernel
{
    /**
     * @var ContainerBuilder|ContainerInterface $container
     */
    public ContainerInterface $container;

    public function __construct()
    {
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(__DIR__));

        $loader->load('Config/container.xml');
    }

    function initRoutes(IRouteConfig $config)
    {
        $klein = new Klein();

        foreach ($config->getRoutes() as $route) {
            $klein->respond($route->getMethod(), $route->getPath(), $route->getCallback());
        }
        $klein->dispatch();
    }

    function initDB(IDBConfig $config): EntityManagerInterface
    {
        $metadataConfig = Setup::createAnnotationMetadataConfiguration(
            [__DIR__ . "/Entity"],
            $config->isDevMode(),
            $config->getProxyDir(),
            $config->getCache(),
            $config->isUseSimpleAnnotationReader()
        );
        $conn = DriverManager::getConnection([
            'url' => $config->getConnectionString(),
        ]);
        return EntityManager::create($conn, $metadataConfig);
    }
}

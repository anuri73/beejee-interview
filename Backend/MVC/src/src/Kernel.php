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
    private $container;

    public function __construct()
    {
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(__DIR__));

        $loader->load('Config/container.xml');
    }

    public function initRoutes(IRouteConfig $config)
    {
        $klein = new Klein();

        foreach ($config->getRoutes() as $route) {
            $klein->respond($route->getMethod(), $route->getPath(), $route->getCallback());
        }
        $klein->dispatch();
    }

    public function initDB(IDBConfig $config): EntityManagerInterface
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

    /**
     * @return ContainerInterface|ContainerBuilder
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface|ContainerBuilder $container
     * @return Kernel
     */
    public function setContainer($container)
    {
        $this->container = $container;
        return $this;
    }
}

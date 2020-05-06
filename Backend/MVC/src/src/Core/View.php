<?php

namespace App\Core;

use App\Core\Twig\AuthExtension;
use App\Core\Twig\DumpExtension;
use App\Core\Twig\RoutingExtension;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class View implements IView
{
    public Environment $twig;

    public string $path;

    public function __construct()
    {
        $loader = new FilesystemLoader('/var/www/mvc.app/src/Resources/views');
        $this->twig = new Environment($loader);
        $this->twig->addExtension(new RoutingExtension());
        $this->twig->addExtension(new DumpExtension());
        $this->twig->addExtension(new AuthExtension());
    }

    /**
     * @param string $template
     * @param array $params
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    function render(string $template, array $params = [])
    {
        return $this->twig->render($template, $params);
    }
}

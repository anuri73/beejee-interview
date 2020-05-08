<?php


namespace App\Core\Twig;

use Symfony\Component\VarDumper\VarDumper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DumpExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('dump', [$this, 'dump']),
        ];
    }

    public function dump($var)
    {
        return VarDumper::dump($var);
    }
}

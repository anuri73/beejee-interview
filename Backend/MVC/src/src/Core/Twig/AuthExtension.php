<?php


namespace App\Core\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AuthExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_authorized', [$this, 'isAuthorized']),
        ];
    }

    public function isAuthorized()
    {
        return $_SESSION['authorized'] === true;
    }
}

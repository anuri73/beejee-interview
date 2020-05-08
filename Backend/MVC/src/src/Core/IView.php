<?php

namespace App\Core;

interface IView
{
    public function render(string $template, array $params = []);
}

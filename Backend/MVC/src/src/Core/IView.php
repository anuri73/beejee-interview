<?php

namespace App\Core;

interface IView
{
    function render(string $template, array $params = []);
}

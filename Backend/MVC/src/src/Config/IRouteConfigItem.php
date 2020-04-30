<?php

namespace App\Config;

interface IRouteConfigItem
{
    public function getMethod(): ?string;

    public function getPath(): string;

    public function getCallback(): array;
}

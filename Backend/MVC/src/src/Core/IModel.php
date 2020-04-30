<?php

namespace App\Core;

use Doctrine\ORM\EntityManagerInterface;

interface IModel
{
    public function getEntityManager(): EntityManagerInterface;
}

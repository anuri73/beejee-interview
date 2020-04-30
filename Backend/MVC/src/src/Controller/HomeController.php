<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\IController;

class HomeController extends Controller implements IController
{
    function index()
    {
        return $this->getView()->render('home/index.html.twig');
    }
}

<?php

namespace App\Core;

abstract class Controller
{
    public IView $view;

    public function __construct(?IView $view = null)
    {
        $this->view = empty($view) ? new View() : $view;
    }

    function getView(): IView
    {
        return $this->view;
    }
}

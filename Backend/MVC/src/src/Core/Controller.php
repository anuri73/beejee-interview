<?php

namespace App\Core;

abstract class Controller
{
    public IView $view;
    public IModel $model;

    public function __construct(IView $view, IModel $model)
    {
        $this->view = $view;
        $this->model = $model;
    }

    function getView(): IView
    {
        return $this->view;
    }

    function getModel(): IModel
    {
        return $this->model;
    }
}

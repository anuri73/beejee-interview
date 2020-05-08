<?php

namespace App\Core;

abstract class Controller
{
    /**
     * @var IView $view
     */
    private $view;
    /**
     * @var IModel
     */
    private $model;

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

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

    public function getView(): IView
    {
        return $this->view;
    }

    public function getModel(): IModel
    {
        return $this->model;
    }
}

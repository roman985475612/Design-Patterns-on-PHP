<?php
namespace MVC\View;


class View
{
    public function __construct(
        private \MVC\Controller\Controller $controller,
        private \MVC\Model\Model $model,
    ) {}

    public function output()
    {
        return $this->model->title;
    }
}
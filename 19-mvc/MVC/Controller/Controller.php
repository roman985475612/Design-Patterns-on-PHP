<?php
namespace MVC\Controller;


class Controller
{
    public function __construct(
        private \MVC\Model\Model $model,
    ) {}

    public function action()
    {
        $this->model->title = 'this is title';
    }
}
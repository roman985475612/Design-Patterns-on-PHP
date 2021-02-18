<?php
namespace App\System\Controller;

use App\System\View\{IView, View};

abstract class AbstractController
{
    protected IView $view;

    protected string $page;

    public function __construct()
    {
        $this->view = new View(BASEPATH, TEMPLATE);
    }

    public function getPage()
    {
        return $this->page;
    }

    public function output()
    {
        echo $this->getPage();
    }
}
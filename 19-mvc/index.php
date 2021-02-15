<?php

use MVC\Controller\Controller;
use MVC\Model\Model;
use MVC\View\View;

spl_autoload_register();


$model = new Model('Hello, world!');

$controller = new Controller($model);
$controller->action();

$view = new View(controller: $controller, model: $model);
echo $view->output();
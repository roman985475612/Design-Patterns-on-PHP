<?php

use Mediator\{App, Data, Page, PageHelper, Router};

spl_autoload_register();

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

$router = new Router;

new PageHelper(
    data: new Data,
    router: $router,
    page: new Page,
);

$router->request();

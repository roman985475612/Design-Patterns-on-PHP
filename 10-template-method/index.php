<?php

use TemplateMethod\{Page, HomePage, AboutPage};

spl_autoload_register();

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

$home = new HomePage();
$home->output();

echo '<hr>';

$about = new AboutPage;
$about->output();
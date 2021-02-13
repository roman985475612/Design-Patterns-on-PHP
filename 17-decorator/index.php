<?php

use Decorator\{BasicPage, HomePage};

spl_autoload_register();

$page = new BasicPage('Hello, world!');
echo $page->getTitle();
echo $page->render();

$homepage = new HomePage($page);
echo $homepage->getTitle();
echo $homepage->render();
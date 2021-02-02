<?php

use Observer\Blog;
use Observer\ChangeTextPlugin;
use Observer\ChangeTitlePlugin;
use Observer\SendMailPlugin;

spl_autoload_register();

$blog = new Blog;
$blog->title = 'Hello, world!';
$blog->text = 'Some text';

$blog->attach(new SendMailPlugin);
$blog->attach(new ChangeTextPlugin, 'blog:create');
$blog->attach(new ChangeTitlePlugin, 'blog:update');

$blog->create();

echo '<pre>' . print_r($blog, 1) . '</pre>';




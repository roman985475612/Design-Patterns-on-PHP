<?php

use Iterator\{Blog, Blog2, Post};

spl_autoload_register();

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

$blog = new Blog2;

$blog->addPost(new Post(
    title: 'New Title 1',
    text: 'New text',
    author: 'John Dow'
));

$blog->addPost(new Post(
    title: 'New Title 2',
    text: 'New text',
    author: 'John Dow'
));

$blog->addPost(new Post(
    title: 'New Title 3',
    text: 'New text',
    author: 'John Dow'
));


foreach ($blog as $post) {
    dd($post);
}


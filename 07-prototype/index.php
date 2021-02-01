<?php

use Prototype\Post;
use Prototype\User;

spl_autoload_register();

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
    echo '<hr>';
}

$user = new User('John Doe');

$post = new Post(
    user: $user, 
    title: 'Post One', 
    text: 'Hello, world 1'
);
$post->addComment('Hello, comment!');

$post2 = clone $post;

dd($post);
dd($post2);
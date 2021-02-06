<?php

use NullObject\{DB, UserRepository};

spl_autoload_register();

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

$db = new DB('localhost', 'root', '', 'patterns');

$userRepository = new UserRepository($db);

dd($userRepository->fetchById(1));
dd($userRepository->fetchById(2));
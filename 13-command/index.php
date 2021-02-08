<?php

use Command\{ChatInterface, GoOffline, GoOnline, User};

spl_autoload_register();

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

$chat = new ChatInterface;

$user = new User;

$chat->setCommand(new GoOffline($user));
$chat->run();
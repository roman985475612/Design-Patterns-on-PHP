<?php

namespace Singletone;

spl_autoload_register(function($class) {
    $className = str_replace(__NAMESPACE__ . '\\', '', $class);
    include 'classes\\' . $className . '.php';
});

$file = FileSave::getInstance();
$file->save(__DIR__);
$file = FileSave::getInstance();
$file->save(__DIR__);
$file = FileSave::getInstance();
$file->save(__DIR__);
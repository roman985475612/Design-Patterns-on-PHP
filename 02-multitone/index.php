<?php
namespace Multitone;

spl_autoload_register(function($class) {
    $className = str_replace(__NAMESPACE__ . '\\', '', $class);
    include 'classes\\' . $className . '.php';
});

$file = FileSave::getInstance('a');
$file->save(__DIR__);
$file = FileSave::getInstance('a');
$file->save(__DIR__);
$file = FileSave::getInstance('b');
$file->save(__DIR__);
<?php
namespace StaticFactory;

spl_autoload_register(function($class) {
    $className = str_replace(__NAMESPACE__ . '\\', '', $class);
    include 'classes\\' . $className . '.php';
});

$obj = StaticFactory::create(Factory::class);
$obj->save();
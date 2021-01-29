<?php
namespace StaticFactory;

class StaticFactory
{
    public static function create(string $type): IFactory
    {
        return new $type;
    }
}
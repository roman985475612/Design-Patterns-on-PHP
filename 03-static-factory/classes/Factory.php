<?php
namespace StaticFactory;

class Factory implements IFactory
{
    public function save()
    {
        echo 'save data';
    }
}
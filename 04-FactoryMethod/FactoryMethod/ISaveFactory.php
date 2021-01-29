<?php

namespace FactoryMethod;

interface ISaveFactory
{
    public function createSaver(): ISave;    
}
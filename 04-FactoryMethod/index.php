<?php

use FactoryMethod\FileSaveFactory;
use FactoryMethod\MySQLSaveFactory;

spl_autoload_register();

// $obj = new FileSaveFactory(__DIR__ . '\textFile.txt');
$obj = new MySQLSaveFactory('127.0.0.1', 'root', '', 'patterns');
$obj->createSaver()->save('Hello world too');


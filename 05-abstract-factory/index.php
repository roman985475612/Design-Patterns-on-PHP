<?php

use AbstractFactory\MysqlDatabaseFactory;
use AbstractFactory\SqliteDatabaseFactory;
use AbstractFactory\IDatabaseFactory;

spl_autoload_register();

function queryExecute(IDatabaseFactory $factory)
{
    $obj = $factory->query();
    $obj->execute("INSERT INTO `messages`(`text`) VALUES ('IDatabaseFactory')");
}

// queryExecute(new MysqlDatabaseFactory('127.0.0.1', 'root', '', 'patterns'));
queryExecute(new SqliteDatabaseFactory('text.db'));

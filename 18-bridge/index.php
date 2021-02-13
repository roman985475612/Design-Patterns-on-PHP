<?php

use Bridge\{MysqlDriver, SqliteDriver, SimpleSave, SafeSave};

spl_autoload_register();


$mysqlDriver = new MysqlDriver(
    host: 'localhost',
    user: 'root',
    pass: '',
    db: 'patterns'
);

$sqliteDriver = new SqliteDriver('bridge.db');

$simpleSave = new SimpleSave($mysqlDriver, 'Hello, bridge');
$simpleSave->save();

$simpleSave = new SimpleSave($sqliteDriver, 'Hello, bridge');
$simpleSave->save();

$safeSave = new SafeSave($mysqlDriver, 'Hello, safe', 'md5');
$safeSave->save();

$safeSave = new SafeSave($sqliteDriver, 'Hello, safe', 'md5');
$safeSave->save();

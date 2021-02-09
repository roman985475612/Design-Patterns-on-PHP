<?php

use Facade\{DB, Mail, Log, Document};

spl_autoload_register();

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

$db = new DB('localhost', 'root', '', 'patterns');
$log = new Log(__DIR__ . '/textfile.txt');
$mail = new Mail('admin@admin.com', 'Admin', '');

$doc = new Document($db, $log, $mail);
$doc->save('Test message!');
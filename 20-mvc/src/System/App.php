<?php
namespace App\System;

use App\System\Model\DbDriver;

class App
{
    private $router;

    private $dbDriver;

    public function __construct() {}

    public function run()
    {
        $this->dbDriver = DbDriver::getInstance();
        $this->dbDriver->setConnection(
            HOST,
            USER,
            PASSWORD,
            DB_NAME
        );

        $this->router = new Router;
        $this->router->processRequest();
    }
}
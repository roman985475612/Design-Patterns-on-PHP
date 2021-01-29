<?php
namespace AbstractFactory;

class MysqlDatabaseFactory implements IDatabaseFactory
{
    public function __construct(
        private string $host,
        private string $user,
        private string $pass,
        private string $db
    ) {}

    public function connect(): IDatabaseConnect
    {
        return new MysqlDatabaseConnect(
            $this->host,
            $this->user,
            $this->pass,
            $this->db,
        );
    }

    public function query(): IDatabaseQuery
    {
        return new MysqlDatabaseQuery($this->connect());
    }
}
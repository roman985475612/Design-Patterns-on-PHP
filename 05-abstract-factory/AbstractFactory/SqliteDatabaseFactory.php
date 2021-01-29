<?php
namespace AbstractFactory;

class SqliteDatabaseFactory implements IDatabaseFactory
{
    public function __construct(
        private string $filepath,
    ) {}

    public function connect(): IDatabaseConnect
    {
        return new SqliteDatabaseConnect($this->filepath);
    }

    public function query(): IDatabaseQuery
    {
        return new SqliteDatabaseQuery($this->connect());
    }
}
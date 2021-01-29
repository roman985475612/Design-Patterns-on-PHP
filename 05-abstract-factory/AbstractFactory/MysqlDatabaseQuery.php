<?php
namespace AbstractFactory;

class MysqlDatabaseQuery implements IDatabaseQuery
{
    public function __construct(
        private IDatabaseConnect $connector,
    ) {}

    public function execute(string $query)
    {
        $this->connector->connection()->query($query);
    }
}
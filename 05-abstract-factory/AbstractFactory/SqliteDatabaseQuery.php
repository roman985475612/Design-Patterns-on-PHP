<?php
namespace AbstractFactory;

class SqliteDatabaseQuery implements IDatabaseQuery
{
    public function __construct(
        private IDatabaseConnect $connector,
    ) {}

    public function execute(string $query)
    {
        // $this->connector->connection()->query("CREATE TABLE messages(text varchar(255));");
        $this->connector->connection()->query($query);
    }
}
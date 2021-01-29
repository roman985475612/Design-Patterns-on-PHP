<?php
namespace AbstractFactory;

class SqliteDatabaseConnect implements IDatabaseConnect
{
    private \SQLite3 $sqlite;

    public function __construct($filepath)
    {
        $this->sqlite = new \SQLite3($filepath);
    }

    public function connection()
    {
        return $this->sqlite;
    }
}
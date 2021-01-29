<?php
namespace AbstractFactory;

class MysqlDatabaseConnect implements IDatabaseConnect
{
    private \mysqli $mysqli;

    public function __construct(
        string $host,
        string $user,
        string $password,
        string $db,
    ) {
        $this->mysqli = new \mysqli($host, $user, $password, $db);

        if ($this->mysqli->connect_error) {
            die('Connection error: (' 
                . $this->mysqli->connect_errno . ') ' 
                . $this->mysqli->connect_error);
        }
    }

    public function connection()
    {
        return $this->mysqli;
    }
}
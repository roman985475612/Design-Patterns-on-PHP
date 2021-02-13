<?php
namespace Bridge;


class MysqlDriver implements IDriver
{
    private \mysqli $mysqli;
    
    public function __construct(
        string $host,
        string $user,
        string $pass,
        string $db
    )
    {
        $this->mysqli = new \mysqli(
            $host, 
            $user, 
            $pass, 
            $db
        );

        if ($this->mysqli->connect_error) {
            die('Connection error: (' 
                . $this->mysqli->connect_errno . ') ' 
                . $this->mysqli->connect_error);
        }
    }
    
    public function execute(string $query)
    {
        $this->mysqli->query($query);
    }
}
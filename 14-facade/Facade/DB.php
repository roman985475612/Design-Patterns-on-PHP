<?php
namespace Facade;


class DB
{
    private \mysqli $mysqli;
    
    public function __construct(
        private string $host,
        private string $user,
        private string $pass,
        private string $db,
    ) {
        $this->connect();
    }
    
    public function connect()
    {
        $this->mysqli = new \mysqli(
            $this->host, 
            $this->user, 
            $this->pass, 
            $this->db
        );

        if ($this->mysqli->connect_error) {
            die('Connection error: (' 
                . $this->mysqli->connect_errno . ') ' 
                . $this->mysqli->connect_error);
        }
    }
    
    public function saveDocument(string $message)
    {
        $query = "INSERT INTO `messages` (`text`) VALUES ({$message})";
        $this->mysqli->query($query);
    }
    
    public function getDB()
    {
        return $this->mysqli;
    }
    
    public function query(string $query)
    {
        $result = $this->mysqli->query($query);
        if ($result) {
            return $result->fetch_assoc();
        }
        return $result;
    }
    
}
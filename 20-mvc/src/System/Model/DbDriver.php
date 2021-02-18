<?php
namespace App\System\Model;


class DbDriver implements IDbDriver
{
    private static $instance;

    private $ins_db;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() 
    {
        if (self::$instance instanceof static) {
            return self::$instance;
        }
        return self::$instance = new static;
    }

    public function setConnection(
        string $host,
        string $user,
        string $pass,
        string $db,
    )
    {
        try {
            $this->ins_db = new \mysqli(
                $host, 
                $user, 
                $pass, 
                $db
            );
    
            if ($this->ins_db->connect_error) {
                die('Connection error: (' 
                    . $this->ins_db->connect_errno . ') ' 
                    . $this->ins_db->connect_error);
            }

            $this->query("SET NAMES 'UTF8'");
    
        } catch(\Exception $e) {
            exit();
        }
    }

    public function query(string $sql)
    {
        return $this->ins_db->query($sql);
    }

    public function getInsDb()
    {
        return $this->ins_db;
    }
}
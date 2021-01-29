<?php
namespace FactoryMethod;

class MySQLSave implements ISave
{
    private $mysqli;

    public function __construct($host, $user, $pass, $db)
    {
        $this->mysqli = new \mysqli($host, $user, $pass, $db);
        if ($this->mysqli->connect_error) {
            die("Ошибка подключения ($this->mysqli->connect_errno) $this->mysqli->connect_error");
        }
    }

    public function save(string $message)
    {
        $sql = "INSERT INTO `messages`(`text`) VALUES ('" . $message . "')";
        if ($this->mysqli->query($sql)) {
            echo "The message has been saved!";
        } else {
            echo "Error: " . $this->mysqli->error;
        }
    }
}
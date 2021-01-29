<?php
namespace FactoryMethod;

class MySQLSaveFactory implements ISaveFactory
{
    public function __construct(
        private string $host,
        private string $user,
        private string $pass, 
        private string $db,
    ) {}

    public function createSaver(): ISave
    {
        return new MySQLSave(
            $this->host,
            $this->user,
            $this->pass,
            $this->db,
        );
    }
}
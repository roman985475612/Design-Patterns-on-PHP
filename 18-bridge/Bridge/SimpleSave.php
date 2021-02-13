<?php
namespace Bridge;


class SimpleSave extends Save
{
    public function __construct(
        IDriver $driver,
        protected $data
    ) {
        parent::__construct($driver);
    }
    
    public function save()
    {
        $query = "INSERT INTO `messages`(`text`) VALUES ('{$this->data}')";
        $this->driver->execute($query);
    }
}
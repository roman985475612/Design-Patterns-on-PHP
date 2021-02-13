<?php
namespace Bridge;


abstract class Save
{
    public function __construct(
        protected IDriver $driver,
    ) {}
    
    public function changeDriver(IDriver $driver)
    {
        $this->driver = $driver;
    }
    
    abstract public function save();
}
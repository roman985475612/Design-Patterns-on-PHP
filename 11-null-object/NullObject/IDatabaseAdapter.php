<?php
namespace NullObject;


interface IDatabaseAdapter
{
    public function connect();
    
    public function getDB();
    
    public function query(string $query);
}
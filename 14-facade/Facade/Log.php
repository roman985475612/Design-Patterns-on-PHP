<?php
namespace Facade;


class Log
{
    public function __construct(
        private string $filepath
    ) {}
    
    public function addLog(string $message)
    {
        file_put_contents($this->filepath, $message, FILE_APPEND);
    }
}
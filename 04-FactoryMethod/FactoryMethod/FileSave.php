<?php
namespace FactoryMethod;

class FileSave implements ISave
{
    public function __construct(
        private string $filepath,
    ) {}

    public function save(string $message)
    {
        file_put_contents($this->filepath, $message);
    }
}
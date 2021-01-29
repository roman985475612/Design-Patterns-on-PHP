<?php

namespace Singletone;

class FileSave
{
    private $filePath;

    private static $instance;

    private function __construct()
    {
        $this->filePath = md5(microtime()) . '.txt';
    }

    private function __clone()
    {

    }

    public static function getInstance(): FileSave
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function save($dir)
    {
        $fullPath = $dir . '/' . $this->filePath;

        $content = " text ";

        if (file_exists($fullPath)) {
            $content = file_get_contents($fullPath) . $content;
        }

        file_put_contents($fullPath, $content);
    }
}
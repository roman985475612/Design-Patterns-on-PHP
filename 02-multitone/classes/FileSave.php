<?php

namespace Multitone;

class FileSave
{
    private $filePath;

    private static $instance = [];

    private function __construct($str)
    {
        $this->filePath = $str . '_' . md5(microtime()) . '.txt';
    }

    private function __clone()
    {

    }

    public static function getInstance($str): FileSave
    {
        if (!isset(static::$instance[$str])) {
            static::$instance[$str] = new static($str);
        }
        return static::$instance[$str];
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
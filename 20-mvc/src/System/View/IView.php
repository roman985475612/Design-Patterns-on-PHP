<?php
namespace App\System\View;


interface IView
{
    public function render(string $path, array $params = []): string;
}
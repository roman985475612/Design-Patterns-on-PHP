<?php
namespace AbstractFactory;

interface IDatabaseQuery
{
    public function execute(string $query);
}
<?php
namespace AbstractFactory;

interface IDatabaseFactory
{
    public function connect(): IDatabaseConnect;

    public function query(): IDatabaseQuery;
}
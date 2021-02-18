<?php
namespace App\System\Model;


interface IDbDriver
{
    public function setConnection(
        string $host,
        string $user,
        string $pass,
        string $dbname,
    );

    public function query(string $sql);

    public function getInsDb();
}
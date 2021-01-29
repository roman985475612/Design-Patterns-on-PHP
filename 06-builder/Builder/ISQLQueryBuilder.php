<?php
namespace Builder;

interface ISQLQueryBuilder
{
    public function select(array $fields): ISQLQueryBuilder;
    
    public function from(string $table): ISQLQueryBuilder;
    
    public function where(string $fields, string $operator = '', string $value = ''): ISQLQueryBuilder;
    
    public function limit(int $start, int $offset): ISQLQueryBuilder;
    
    public function getQuery(): string;
}
<?php
namespace Builder;

class MysqlQueryBuilder implements ISQLQueryBuilder
{
    private $query;
    
    public function init()
    {
        $this->query = new \stdClass;
    }
    
    public function select(array $fields): ISQLQueryBuilder
    {
        $this->init();
        $this->query->base = "SELECT " . implode(", ", $fields);
        
        return $this;
    }
    
    public function from(string $table): ISQLQueryBuilder
    {
        $this->query->base .= " FROM " . $table;
        
        return $this;
    }
    
    public function where(string $ar1, string $ar2 = '', string $ar3 = ''): ISQLQueryBuilder
    {
        if (func_num_args() == 1) {
           $this->query->where[] = 'id = ' . $ar1; 
        } elseif (func_num_args() == 2) {
            $this->query->where[] = $ar1 . ' = ' . $ar2;
        } elseif (func_num_args() == 3) {
            $this->query->where[] = $ar1 . ' ' . $ar2 . ' ' . $ar3;
        }
        
        return $this;
    }
    
    public function limit(int $start, int $offset): ISQLQueryBuilder
    {
        $this->query->limit = ' LIMIT ' . $start . ', ' . $offset;

        return $this;
    }
    
    public function getQuery(): string
    {
        $sql = '';
        $sql .= $this->query->base;
        
        if (!empty($this->query->where)) {
            $sql .= " WHERE " . implode(" AND ", $this->query->where);
        }
        
        if (!empty($this->query->limit)) {
            $sql .= $this->query->limit;
        }
        
        $sql .= ';';
        
        return $sql;
    }

}
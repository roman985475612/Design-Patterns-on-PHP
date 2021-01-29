<?php

use Builder\ISQLQueryBuilder;
use Builder\MysqlQueryBuilder;

spl_autoload_register();

function queryExecute(ISQLQueryBuilder $builder)
{
    $query = $builder
            ->select(['id', 'text'])
            ->from('messages')
            ->where('35')
            ->where('email', 'john@smith')
            ->where('age', '>=', '18')
            ->getQuery();
            
    echo $query;
}

queryExecute(new MysqlQueryBuilder);




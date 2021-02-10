<?php

use Adapter\{WebMoney, PaymentAdapter};

spl_autoload_register();

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

$form = new PaymentAdapter(new WebMoney(['key' => 'dfas84hfds9h3']));
$form->pay(990.95);
<?php
namespace Adapter;


class WebMoney implements IPayment
{
    public function __construct(
        private array $params,
    ) {}
    
    public function getFormPay(float $total)
    {
        echo print_r($this->params, 1) . '<hr>';
        echo "Payment form $total";
    }
}
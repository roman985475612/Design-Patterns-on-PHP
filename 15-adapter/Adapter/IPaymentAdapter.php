<?php
namespace Adapter;


interface IPaymentAdapter
{
    public function pay(float $total);
}
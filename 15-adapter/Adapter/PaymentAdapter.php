<?php
namespace Adapter;


class PaymentAdapter implements IPaymentAdapter
{
    public function __construct(
        private IPayment $payObject
    ) {}
    
    public function pay(float $total)
    {
        $this->payObject->getFormPay($total);
    }
}
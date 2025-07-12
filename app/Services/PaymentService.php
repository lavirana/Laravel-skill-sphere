<?php

namespace App\Services;

use App\Services\PaypalService;

class PaymentService
{
    protected $paypal;

    public function __construct(PaypalService $paypal)
    {
        $this->paypal = $paypal;
    }

    public function makePayment($amount)
    {
        return $this->paypal->pay($amount);
    }
}

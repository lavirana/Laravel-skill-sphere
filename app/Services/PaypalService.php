<?php

namespace App\Services;

class PaypalService
{
    public function pay($amount)
    {
        return "Paid ₹$amount using Paypal";
    }
}

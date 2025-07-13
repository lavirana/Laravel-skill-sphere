<?php

namespace App\Contracts;

interface PaymentGatewayInterface {
    public function charge($amount);
}

// This interface defines a contract for payment gateways, requiring a charge method that accepts an amount.
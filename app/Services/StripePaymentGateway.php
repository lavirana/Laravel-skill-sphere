<?php

namespace App\Services;


use App\Contracts\PaymentGatewayInterface;


class StripePaymentGateway implements PaymentGatewayInterface {
    public function charge($amount) {
        return "Charging ₹$amount via Stripe";
    }
}
// This class implements the PaymentGatewayInterface and provides a method to charge an amount using Stripe.
<?php

namespace App\Services;

use App\Contracts\MessageSenderInterface;

class SmsSender implements MessageSenderInterface {

    public function send($to, $message)
    {
        // Here you would implement the logic to send an SMS.
        // For demonstration purposes, we'll just return a string.
        return "SMS sent to $to: $message";
    }

}
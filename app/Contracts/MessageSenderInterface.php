<?php

namespace App\Contracts;

interface MessageSenderInterface {
    public function send($to, $message);
}
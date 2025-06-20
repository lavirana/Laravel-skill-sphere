<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeemail;

class EmailController extends Controller
{
    public function sendEmail(){
       $toEmail = "ashishrana288@gmail.com";
       $cc = "rahulrajputdon91@gmail.com";
       $message = "Hello";
       $subject = "Welcome to our platform";

       $request = Mail::to($toEmail)->cc($cc)->send(new welcomeemail($message,$subject));

       dd($request);
    }
}

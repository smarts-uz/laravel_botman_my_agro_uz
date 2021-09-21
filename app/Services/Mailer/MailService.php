<?php

namespace App\Services\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class MailService {
    public function __construct()
    {


    }
    public function sendMail($to, $name, $text){
        $data = array(
            'name'      =>  $name,
            'message'   =>   $text
        );

        Mail::to($to)->send(new SendMail($data));
    }
}

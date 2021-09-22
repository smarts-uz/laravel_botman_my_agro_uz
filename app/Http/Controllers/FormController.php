<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class  FormController extends Controller {

    public function run (Request $request) {
        $details = [
            'title' => 'Asror Zokirov',
            'body' => 'Test mail sent by Laravel 8 using SMTP.'
        ];

        Mail::to($request->email)->send(new \App\Mail\SendMail($details));
        dd("Email is Sent, please check your inbox.");
    }
}

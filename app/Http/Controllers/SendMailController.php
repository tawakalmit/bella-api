<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;

class SendMailController extends Controller
{
    public function postmail (Request $request)
    {
        $mail = $request->mail;
        Mail::to('iqscenix@gmail.com')->send(new HelloMail());
        return $request;
    }
}

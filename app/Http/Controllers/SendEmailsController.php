<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class SendEmailsController extends Controller
{
    public function index()
    {
        Mail::to('test@gmail.com')->send(new TestMail());
    }
}

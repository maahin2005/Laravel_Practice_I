<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class ExampleController extends Controller
{
    public function sendEmail()
    {
        $user = (object)[
            'name' => 'John Doe',
            'email' => 'mahin.malek2005@gmail.com'
        ];

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return 'Email sent successfully!';
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send()
    {
        Mail::to([
            'address' => 'dargonhelsing@gmail.com',
        ])->send(new Registered());

        return response()->json(['message' => 'Request completed']);
    }
}

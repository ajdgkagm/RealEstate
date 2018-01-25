<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    public function home()
    {
        return view('auth.dashboard.user.home');
    }
}

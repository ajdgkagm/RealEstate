<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function home()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('auth.dashboard.admin.home', compact('users'));
    }
}

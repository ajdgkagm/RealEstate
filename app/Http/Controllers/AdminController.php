<?php

namespace App\Http\Controllers;

use App\Message;
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

        $messages = Message::where('to', auth()->id())
            ->where('read', false)
            ->get();

        $strangers = Message::where('to', 0)
            ->where('read', false)
            ->get();

        return view('auth.dashboard.admin.home', compact('users', 'messages', 'strangers'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    public function home()
    {
        $reservations = Reservation::with('property')->where('user_id', auth()->id())->get();
        return view('auth.dashboard.user.home', compact('reservations'));
    }
}

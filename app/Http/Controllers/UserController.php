<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user')->only('home');
        $this->middleware('auth')->except('home');
    }

    //Homepage of ordinary user
    public function home()
    {
        $reservations = Reservation::with('property')->where('user_id', auth()->id())->get();
        return view('auth.dashboard.user.home', compact('reservations'));
    }

    public function edit(User $user)
    {
        $this->validUser($user);
        return view('auth.dashboard.profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validUser($user);
        //@todo this code can be simplified..... culprit was firefox REMEMBER PASSWORD
        if ($request->email === null) {
            $validated = $request->validate([
                'name'     => 'required|string|max:255',
                'password' => 'nullable|string|min:8|confirmed|required_with:password_confirmation',
            ]);
        } else {
            $validated = $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|max:255|unique:users',
                'password' => 'nullable|string|min:8|confirmed|required_with:password_confirmation',
            ]);
        }

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email === null ? $user->email : $request->email,
            'password' => $request->password === null ? $user->password : bcrypt($request->password),
        ]);

        return back()->with('msg', 'Successfully updated your profile');
    }

    public function validUser($user)
    {
        if (auth()->id() !== $user->id) {
            if (!auth()->user()->hasRole('admin')) {
                abort(405, 'User Id Mismatched');
            }
        }
    }
}

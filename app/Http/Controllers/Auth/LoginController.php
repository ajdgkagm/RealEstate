<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $request->validate([
            'email' => 'required|min:5|email',
            'password' => 'required|min:8'
        ]);


        // check if username and password match any roles
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $user = Auth::user();
            foreach ($user->roles as $role) {
                if ($role->name === 'admin') {
                    return redirect()->intended(route('admin.home'));
                }

                return redirect()->intended(route('home'));
            };
        }
/*        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.home'));
        } else if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('home'));
        }*/

        // if failed return with error
        return redirect()->back()
            ->withErrors(['invalid' => 'Invalid username or password.'])
            ->withInput($request->except('password'));
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmployeeMaster;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // dd($request->all());


        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $admin = EmployeeMaster::where('email', $request->email)->first();
            if ($admin->is_admin == 1) {
                return redirect()->route('dashboard');
            }
            return redirect()->route('profile');
        }

        return redirect()->back()->with(['failed_login' => 'Invalid email or password!!!']);
    }

    public function sendFailedLoginResponse()
    {
        return redirect('/login')->with(['failed_login' => 'Invalid email or password!!!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with(['success_logout' => 'You are logged out!!!']);
    }
}

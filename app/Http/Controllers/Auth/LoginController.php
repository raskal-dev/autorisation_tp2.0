<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

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
        $input = $request->all();

        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))) {
            # code...
            if (auth()->user()->is_admin == 1) {
                # code...
                return redirect()->route('admin.home');
            } else {
                # code...
                return redirect()->route('home');
            }
        } else {
            # code...
            return redirect()->route('login')->with('error','Email ou mot de passe est incorrect !');
        }

    }
}

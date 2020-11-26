<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    public function index ()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            if (auth()->user()->rule == 1) {
                $user = User::find(auth()->user()->id);
                $user->remember_token = $inputVal['remember_token'];
                $user->save();
                return redirect()->route('customer');

            }elseif (auth()->user()->rule == 2){

                $user = User::find(auth()->user()->id);
                $user->remember_token = $inputVal['remember_token'];
                $user->save();

                return redirect()->route('seller');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
        }
    }

}

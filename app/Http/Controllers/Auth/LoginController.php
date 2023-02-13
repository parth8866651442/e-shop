<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

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

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm(Request $request)
    {   
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return response()->json(['status' => false, 'msg' => 'Credentials do not match'], 200);
        // return redirect()->route('login')->with('error', 'Credentials do not match');
    }
    public function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        
        return response()->json(['status' => true, 'msg' => 'Login Successfully',"url"=>route('home'),'to'=> $request->to], 200);
        // return redirect()->route('home')->with('success', 'Login Successfully');
    }
    public function attemptLogin(Request $request)
    {    // check user role  
        $user = User::where(['email' => $request->email,'role'=> 'user', 'is_active' => 1, 'is_deleted' => 0])->first();

        if(isset($user->is_active) && $user->is_active == 0){
            return response()->json(['status' => false, 'msg' => 'Your account is Deactive'], 200);
            // return redirect()->route('login')->with('error', 'Your account is Deactive');
        }

        if(!empty($user)){
            if(Hash::check($request->password, $user->password)){
                return $this->guard()->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'));
            }
        }
        return false;
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        return redirect('/')->with('success', 'Logout successfully');
    }
}

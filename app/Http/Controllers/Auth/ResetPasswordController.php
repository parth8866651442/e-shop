<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use DB,URL;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function reset(Request $request)
    {
        $validator = [
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $validator);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'msg' => join(", ",$validator->errors()->all()),'url'=>URL::to('/')], 200);
            // return redirect()->with('error', join(", ",$validator->errors()->all()));
        }else{
            $user = User::where(['email' => $request->email,'role'=> 'user' ,'is_active' => 1, 'is_deleted' => 0])->first();
            
            if(!empty($user) && ($user->email === $request->input('email'))){
                $user->password = Hash::make($request->input('password'));
                $user->save();
                event(new PasswordReset($user));
                return response()->json(['status' => true, 'msg' => 'Reset password successfully.','url'=>URL::to('/')], 200);
                // return redirect()->route('login')->with('success', 'Reset password successfully.');
            }else{
                return response()->json(['status' => false, 'msg' => 'Credentials do not match.','url'=>URL::to('/')], 200);
                // return redirect()->route('login')->with('error', 'Credentials do not match');
            }
        }
    }

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');
        
        if(!isset($request->email) && empty($request->email)){
            return redirect()->route('login')->with('error', 'Link is expired');
        }

        $tokenCheck = DB::table('password_resets')
        ->where('email',$request->email)
        ->first();
        
        if(Carbon::parse($tokenCheck->created_at)->addSeconds(60*60)->isPast()){
            return response()->json(['status' => false, 'msg' => 'Link is expired','url'=>URL::to('/')], 200);
            // return redirect()->route('login')->with('error', 'Link is expired');
        }
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}

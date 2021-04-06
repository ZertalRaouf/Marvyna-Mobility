<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Mail\UserResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest:user")->except('logout');
    }

    // Login view
    public function index()
    {
        return view("user.auth.login");
    }

    // Login post method with validation
    public function login(Request $request)
    {
        $data = $this->validate($request,[
            'email'     => "required|email",
            'password'  => "required|string|min:8"
        ]);
        $remember_me = $request->has("remember_me") ? 1 : 0 ;
        if (auth()->guard("user")->attempt($data,$remember_me))
        {
            return redirect()->intended(route("user.dashboard"));
        }else
        {
            session()->flash("error","incorrect information login");
            return redirect()->route("admin.login");
        }
    }

    // Forgot password view
    public function email_form()
    {
        return view("user.auth.email");
    }

    public function forgot_password(Request $request)
    {
        $data = $request->validate([
            'email'  => 'required|email'
        ]);

        $user = Admin::where("email",$data['email'])->first();
        if (!empty($user))
        {
            $token = app('auth.password.broker')->createToken($user);
            DB::table('password_resets')->insert([
                'email'      => $user->email,
                'token'      => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::to($user->email)->send(new UserResetPassword(['user'=>$user,'token'=>$token]));
            session()->flash('success',"An email has been sent, please click the link when you get it.");
            return back();
        }
        session()->flash('error','Email Not Found');
        return back();

    }


    // Reset Password
    public function reset_password_form ($token)
    {
        $check_token= DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHour(2))->first();
        if (!empty($check_token))
        {
            return view('user.auth.reset',compact('check_token'));
        }else
        {
            session()->flash("error","Token not valid");
            return redirect('user/forgot-password');
        }
    }

    public function reset_password($token, Request $request)
    {

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|string|min:8|confirmed',
        ]);
        $check_token= DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHour(2))->first();
        if (!empty($check_token))
        {
            $user = User::where('email',$request->email)->first();

            if (empty($user))
            {
                session()->flash("error","Email Not Found");
                return back();
            }
            $user->update(['password'=>bcrypt($request->password)]);
            DB::table('password_resets')->where('email',$user->email)->delete();
            session()->flash("success","Your Password Has Been Updated");
            return redirect(route('user.login'));
        }else
        {
            session()->flash("error","Oops!! Something wrong! please try again");
            return redirect(url('user/forgot-password'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("user.login");
    }
}

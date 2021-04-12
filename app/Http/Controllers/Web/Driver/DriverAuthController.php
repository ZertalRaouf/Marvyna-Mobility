<?php

namespace App\Http\Controllers\Web\Driver;

use App\Http\Controllers\Controller;
use App\Mail\DriverResetPassword;
use App\Models\Diver;
use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DriverAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest:driver")->except('logout');
    }

    // Login view
    public function index()
    {
        return view("driver.auth.login");
    }

    // Login post method with validation
    public function login(Request $request)
    {
        $data = $this->validate($request,[
            'email'     => "required|email",
            'password'  => "required|string|min:8"
        ]);
        $remember_me = $request->has("remember_me") ? 1 : 0 ;
        if (auth()->guard("driver")->attempt($data,$remember_me))
        {
            return redirect()->intended(route("driver.dashboard"));
        }else
        {
            session()->flash("error","incorrect information login");
            return redirect()->route("driver.login.form");
        }
    }

    // Forgot password view
    public function email_form()
    {
        return view("driver.auth.email");
    }

    public function forgot_password(Request $request)
    {
        $data = $request->validate([
            'email'  => 'required|email'
        ]);

        $driver = Driver::where("email",$data['email'])->first();
        if (!empty($driver))
        {
            $token = app('auth.password.broker')->createToken($driver);
            DB::table('password_resets')->insert([
                'email'      => $driver->email,
                'token'      => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::to($driver->email)->send(new UserResetPassword(['driver'=>$driver,'token'=>$token]));
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
            return view('driver.auth.reset',compact('check_token'));
        }else
        {
            session()->flash("error","Token not valid");
            return redirect('driver/forgot-password');
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
            $driver = Driver::where('email',$request->email)->first();

            if (empty($driver))
            {
                session()->flash("error","Email Not Found");
                return back();
            }
            $driver->update(['password'=>bcrypt($request->password)]);
            DB::table('password_resets')->where('email',$driver->email)->delete();
            session()->flash("success","Your Password Has Been Updated");
            return redirect(route('driver.login.form'));
        }else
        {
            session()->flash("error","Oops!! Something wrong! please try again");
            return redirect(url('driver/forgot-password'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("driver.login.form");
    }
}

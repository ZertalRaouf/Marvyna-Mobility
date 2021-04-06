<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest:admin")->except('logout');
    }

    // Login view
    public function index()
    {
        return view("admin.auth.login");
    }

    // Login post method with validation
    public function login(Request $request)
    {
        $data = $this->validate($request,[
            'email'     => "required|email",
            'password'  => "required|string|min:8"
        ]);
        $remember_me = $request->has("remember_me") ? 1 : 0 ;
        if (auth()->guard("admin")->attempt($data,$remember_me))
        {
            return redirect()->intended(route("admin.dashboard"));
        }else
        {
            session()->flash("error","incorrect information login");
            return redirect()->route("admin.login");
        }
    }

    // Forgot password view
    public function email_form()
    {
        return view("admin.auth.email");
    }

    public function forgot_password(Request $request)
    {
        $data = $request->validate([
            'email'  => 'required|email'
        ]);

        $admin = Admin::where("email",$data['email'])->first();
        if (!empty($admin))
        {
            $token = app('auth.password.broker')->createToken($admin);
            DB::table('password_resets')->insert([
                'email'      => $admin->email,
                'token'      => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['admin'=>$admin,'token'=>$token]));
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
            return view('admin.auth.reset',compact('check_token'));
        }else
        {
            session()->flash("error","Token not valid");
            return redirect('admin/forgot-password');
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
            $admin = Admin::where('email',$request->email)->first();

            if (empty($admin))
            {
                session()->flash("error","Email Not Found");
                return back();
            }
            $admin->update(['password'=>bcrypt($request->password)]);
            DB::table('password_resets')->where('email',$admin->email)->delete();
            session()->flash("success","Your Password Has Been Updated");
            return redirect(route('admin.login'));
        }else
        {
            session()->flash("error","Oops!! Something wrong! please try again");
            return redirect(url('admin/forgot-password'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("admin.login");
    }
}

<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Actuality;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $news = Actuality::orderBy('created_at','desc')->paginate(10);
        $u = auth('user')->user();
        $circuits = collect();
        foreach ($u->students as $student)
        {
            foreach ($student->circuits as $circuit)
            {
                $circuits->add($circuit);
            }
        }
        return view('user.dashboard',compact('news','u', 'circuits'));
    }

    public function settings()
    {
        return view('user.settings');
    }

    public function update(Request $request)
    {
        $result = $request->validate([
            'password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        if ($result['password'] !== null)
        {
            $data['password'] = $result['password'];
            auth('user')->user()->update($data);

        }

        return redirect()->back();
    }
}

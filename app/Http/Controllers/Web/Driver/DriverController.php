<?php

namespace App\Http\Controllers\Web\Driver;

use App\Http\Controllers\Controller;
use App\Models\Actuality;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $news = Actuality::orderBy('created_at','desc')->paginate(10);
        $d = auth('driver')->user();
        return view('driver.dashboard',compact('news','d'));
    }

    public function settings()
    {
        return view('driver.settings');
    }

    public function update(Request $request)
    {
        $result = $request->validate([
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'is_available' => 'required|string|'
        ]);

        $data['is_available'] = $result['is_available'] === 'yes';

        if ($result['password'] !== null)
        {
            $data['password'] = $result['password'];

        }
        auth('driver')->user()->update($data);

        return redirect()->back();
    }
}

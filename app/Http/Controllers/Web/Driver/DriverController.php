<?php

namespace App\Http\Controllers\Web\Driver;

use App\Http\Controllers\Controller;
use App\Models\Actuality;
use App\Models\Availability;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $news = Actuality::orderBy('created_at','desc')->paginate(4);
        $availabilities = Availability::where('driver_id',auth('driver')->id())->paginate(10);
        $d = auth('driver')->user();
        return view('driver.dashboard',compact('news','d','availabilities'));
    }

    public function profile()
    {
        $d = auth('driver')->user();
        return view('driver.profile',compact('d'));
    }

    public function roadmap()
    {
        $d = auth('driver')->user();
        return view('driver.roadmap',compact('d'));
    }

    public function settings()
    {
        $d = auth('driver')->user();
        return view('driver.settings',compact('d'));
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

        return redirect()->route('driver.dashboard');
    }

    public function availabilityStore(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i|after:from',
            'reason' => 'required|string|max:200',
            'note' => 'sometimes|nullable|string|max:200',
        ]);

        auth('driver')->user()->availabilities()->create($data);

        session()->flash('flash','availability created');
        return back();
    }
}

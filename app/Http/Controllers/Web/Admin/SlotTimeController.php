<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use App\Models\SlotTime;
use Illuminate\Http\Request;

class SlotTimeController extends Controller
{

    public function index()
    {
        abort('404');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'slot_id' => 'required|integer|exists:slots,id',
            'morning_start_at' => 'required|date_format:H:i',
            'morning_end_at' => 'required|date_format:H:i|after:morning_start_at',
            'after_noon_start_at' => 'required|date_format:H:i|after:morning_end_at',
            'after_noon_end_at' => 'required|date_format:H:i|after:after_noon_start_at',
            'note' => 'Sometimes|nullable|string|max:200',
            'day' => 'required|string|in:'.implode(',',config('days')),
        ]);

        try {
            SlotTime::create($data);
            session()->flash('success','Time Has Been Created successfully');
            return back();
        }catch (\Exception $exception)
        {
            session()->flash('error','Oops! Something went wrong, please try again');
            return back();
        }
    }

    public function show($id)
    {
        $st = SlotTime::with('slot')->findOrFail($id);
        return view('admin.slots.times.show',compact('st'));
    }

    public function edit($id)
    {
        $st = SlotTime::with('slot')->findOrFail($id);
        $slots = Slot::where('state',true)->get();
        return view('admin.slots.times.edit',compact('st','slots'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'slot_id' => 'required|integer|exists:slots,id',
            'morning_start_at' => 'required|date_format:H:i',
            'morning_end_at' => 'required|date_format:H:i|after:morning_start_at',
            'after_noon_start_at' => 'required|date_format:H:i|after:morning_end_at',
            'after_noon_end_at' => 'required|date_format:H:i|after:after_noon_start_at',
            'note' => 'Sometimes|nullable|string|max:200',
            'day' => 'required|string|in:'.implode(',',config('days')),
        ]);

        try {
            $st = SlotTime::findOrFail($id);
            $st->update($data);
            session()->flash('success','Time Has Been Updated successfully');
            return redirect()->route('admin.slot.show',$st->slot_id);
        }catch (\Exception $exception)
        {
            session()->flash('error','Oops! Something went wrong, please try again');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            SlotTime::destroy($id);
            session()->flash('success','Time Has Been Deleted successfully');
            return back();
        }catch (\Exception $exception)
        {
            session()->flash('error','Oops! Something went wrong, please try again');
            return back();
        }
    }
}

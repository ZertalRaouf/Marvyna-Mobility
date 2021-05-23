<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Driver;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{

    public function index()
    {
        $availabilities = Availability::with('driver')->latest()->paginate(10);
        return view('admin.availabilities.index',compact('availabilities'));
    }

    public function create()
    {
        $drivers = Driver::all();
        return view('admin.availabilities.create',compact('drivers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'driver_id' => 'required|integer|exists:drivers,id',
            'date' => 'required|date',
            'from' => 'required|date_format:H:i|after',
            'to' => 'required|date_format:H:i|after:from',
            'reason' => 'required|string|max:200',
            'note' => 'sometimes|nullable|string|max:200',
        ]);
         Availability::created($data);
         session()->flash('success','availability Has Been created successfully');
        return redirect()->route('admin.availabilities.index');
    }


    public function show($id)
    {
        $drivers = Driver::all();
        return view('admin.availabilities.create',compact('drivers'));
    }


    public function edit($id)
    {
        $drivers = Driver::all();
        $a = Availability::findOrFail($id);
        return view('admin.availabilities.create',compact('drivers','a'));
    }

    public function update($id,Request $request)
    {
        $data =$request->validate([
            'driver_id' => 'required|integer|exists:drivers,id',
            'date' => 'required|date',
            'from' => 'required|date_format:H:i|after',
            'to' => 'required|date_format:H:i|after:from',
            'reason' => 'required|string|max:200',
            'note' => 'sometimes|nullable|string|max:200',
        ]);
        $a = Availability::findOrFail($id);
        $a->update($data);
        session()->flash('success','availability Has Been updated successfully');
        return redirect()->route('admin.availabilities.index');
    }

    public function destroy($id)
    {
        Availability::destroy($id);
        session()->flash('success','availability Has Been deleted successfully');
        return redirect()->route('admin.availabilities.index');    }
}

<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circuit;
use App\Models\Driver;
use App\Models\Student;
use App\Models\Vehicule;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CircuitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $cs = Circuit::orderBy('created_at','desc')->paginate(10);
        return view('admin.circuits.index',compact('cs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $students = Student::all();
        $drivers = Driver::all();
        $vs = Vehicule::all();
        return \view('admin.circuits.create',compact('students','vs','drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'from_date'  => 'required|date',
            'direction' => 'required|string',
            'observation' => 'sometimes|nullable|string',
            'driver_id' => 'required|integer|gt:0|exists:drivers,id',
            'vehicule_id'=> 'required|integer|gt:0|exists:vehicules,id',
            'students'=> 'required|array',
        ]);

        $c = Circuit::create($data);
        $c->students()->attach($data['students']);
        session()->flash('success','Success');
        return redirect()->route('admin.circuits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Circuit $circuit
     * @return Response
     */
    public function show(Circuit $circuit)
    {
        return \view('admin.circuits.show',compact('circuit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Circuit $circuit
     * @return Response
     */
    public function edit(Circuit $circuit)
    {
        $students = Student::all();
        $drivers = Driver::all();
        $vs = Vehicule::all();
        return \view('admin.circuits.edit',compact('circuit','students','drivers','vs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Circuit $circuit
     * @return RedirectResponse
     */
    public function update(Request $request, Circuit $circuit)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'from_date'  => 'required|date',
            'direction' => 'required|string',
            'observation' => 'sometimes|nullable|string',
            'driver_id' => 'required|integer|gt:0|exists:drivers,id',
            'vehicule_id'=> 'required|integer|gt:0|exists:vehicules,id',
            'students'=> 'required|array',
        ]);

        $c = $circuit->update($data);
        $c->students()->sync($data['students']);
        session()->flash('success','Success');
        return redirect()->route('admin.circuits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Circuit $circuit
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Circuit $circuit): RedirectResponse
    {
        $circuit->delete();
        session()->flash('success','success message');
        return redirect()->route('admin.circuits.index');

    }
}

<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicule;
use App\QueryFilter\VehiculeSearch;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;

class VehiculeController extends Controller
{
    public function index(){
        $vehicules = app(Pipeline::class)
            ->send(Vehicule::latest()->newQuery())
            ->through([
                VehiculeSearch::class,
            ])
            ->thenReturn()
            ->paginate(10);
        return view('admin.vehicules.index',compact('vehicules'));
    }

    public function create(){
        return view('admin.vehicules.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'code'=>'required|string|max:45',
            'type'=>'required|integer|max:45',
            'matriculation'=>'required|string|max:45',
            'matriculation_date'=>'date|string|max:45',
            'first_circulation_date'=>'required|date|max:45',
            'is_rentable'=>'required|string|max:45',
            'brand'=>'required|string|max:45',
            'model'=>'required|string|max:45',
            'motorization'=>'required|string|max:45',
            'fuel'=>'required|integer|max:45',
            'color'=>'required|string|max:45',
            'number_of_places'=>'required|integer|max:45',
            'tax_horses'=>'required|integer',
            'serial_number'=>'required|string|max:45',
            'initial_number_of_km'=>'required|numeric',
            'mode_of_aquisition'=>'required|integer|max:45',
            'key_double_location'=>'required|string|max:45',
            'photos'=>'sometimes|nullable|file|image|max:10000',
            'observation'=>'nullable|string|max:45'
        ]);
        Vehicule::create($data);
        session()->flash('success','Vehicule crée avec succes');
        return redirect()->route('admin.vehicules.index');
    }

    public function show($id){
        $vehicule = Vehicule::find($id);
        if(!$vehicule){
            return abort(404,'Vehicule introuvable');
        }
        return view('admin.vehicules.show',compact('vehicule'));
    }

    public function edit($id){
        $vehicule = Vehicule::findOrFail($id); // We don't need the if condition
        return view('admin.vehicules.edit',compact('vehicule'));
    }

    public function update($id,Request $request){
        $data = $request->validate([
            'code'=>'required|string|max:45',
            'type'=>'required|integer|max:45',
            'matriculation'=>'required|string|max:45',
            'matriculation_date'=>'date|string|max:45',
            'first_circulation_date'=>'required|date|max:45',
            'is_rentable'=>'required|string|max:45',
            'brand'=>'required|string|max:45',
            'model'=>'required|string|max:45',
            'motorization'=>'required|string|max:45',
            'fuel'=>'required|integer|max:45',
            'color'=>'required|string|max:45',
            'number_of_places'=>'required|integer|max:45',
            'tax_horses'=>'required|integer',
            'serial_number'=>'required|string|max:45',
            'initial_number_of_km'=>'required|numeric',
            'mode_of_aquisition'=>'required|integer|max:45',
            'key_double_location'=>'required|string|max:45',
            'photos'=>'string|nullable',
            'observation'=>'string|max:45|nullable'
        ]);
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->update($data);
        session()->flash('success','Vehicule modifié avec succes');
        return redirect()->route('admin.vehicules.index');
    }

    public function destroy($id){
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();
        session()->flash('success','Vehicule supprimé avec succes');
        return redirect()->route('admin.vehicules.index');
    }
}

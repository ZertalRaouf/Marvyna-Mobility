<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index(){
        $vehicules = Vehicule::paginate(10);
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
            'tax_horses'=>'required|integer|max:45',
            'serial_number'=>'required|string|max:45',
            'initial_number_of_km'=>'required|numeric|max:45',
            'mode_of_aquisition'=>'required|integer|max:45',
            'key_double_location'=>'required|string|max:45',
            'photos'=>'required|string|max:45',
            'observation'=>'required|string|max:45'
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
        return view('admin.vehicule.edit',compact('vehicule'));
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
            'tax_horses'=>'required|integer|max:45',
            'serial_number'=>'required|string|max:45',
            'initial_number_of_km'=>'required|numeric|max:45',
            'mode_of_aquisition'=>'required|integer|max:45',
            'key_double_location'=>'required|string|max:45',
            'photos'=>'string',
            'observation'=>'string|max:45'
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

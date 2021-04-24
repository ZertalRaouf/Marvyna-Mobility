<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(){
        $drivers = Driver::paginate(10);
        return view('admin.drivers.index',compact('drivers'));
    }

    public function create(){
        return view('admin.drivers.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:45',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);
        Driver::create($data);
        session()->flash('success','Chauffeur créé avec succes');
        return redirect()->route('admin.drivers.index');
    }

    public function show($id){
        $driver = Driver::find($id);
        if(!$driver){
            return abort(404,'Chauffeur introuvable');
        }
        return view('admin.drivers.show',compact('driver'));
    }

    public function edit($id){
        $driver = Driver::findOrFail($id); // We don't need the if condition
        return view('admin.drivers.edit',compact('driver'));
    }

    public function update($id,Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:45',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:8|confirmed'
        ]);
        $driver = Driver::findOrFail($id);
        $driver->update($data);
        session()->flash('success','Chauffeur modifié avec succes');
        return redirect()->route('admin.drivers.index');
    }

    public function destroy($id){
        $driver = Driver::findOrFail($id);
        $driver->delete();
        session()->flash('success','Chauffeur supprimé avec succes');
        return redirect()->route('admin.drivers.index');
    }
}

<?php

namespace App\Http\Controllers\Web\Admin;

use App\Exports\DriversExport;
use App\Exports\StudentsExport;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
            'civility'=>'required|string',
            'first_name'=>'required|string|max:45',
            'last_name'=>'required|string|max:45',
            'address'=>'required|string|max:250',
            'phone'=>'required|string',
            'mobile'=>'sometimes|nullable|string',
            'email'=>'required|email|unique:drivers,email',
            'password'=>'required|min:8',
            'birth_date'=>'required|date',
            'nationality'=>'required|string|max:45',
            'place_of_birth'=>'required|date',
            'security_number'=>'required|string|max:45',
            'photo'=>'required|file|image|max:10000',
            'licence_number'=>'required|string|max:45',
            'licence_expiration_date'=>'required|date',
            'licence_photo'=>'required|file|image|max:10000',
            'is_available'=>'required|string',
            'observation'=>'sometimes|nullable|string|max:450'
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
            'civility'=>'required|string',
            'first_name'=>'required|string|max:45',
            'last_name'=>'required|string|max:45',
            'address'=>'required|string|max:250',
            'phone'=>'required|string',
            'mobile'=>'sometimes|nullable|string',
            'email'=>'required|email|unique:drivers,email,'.$id,
            'password'=>'required|min:8|confirmed',
            'birth_date'=>'required|date',
            'nationality'=>'required|string|max:45',
            'place_of_birth'=>'required|date',
            'security_number'=>'required|string|max:45',
            'photo'=>'required|file|image|max:10000',
            'licence_number'=>'required|string|max:45',
            'licence_expiration_date'=>'required|date',
            'licence_photo'=>'required|file|image|max:10000',
            'is_available'=>'required|string',
            'observation'=>'sometimes|nullable|string|max:450'
        ]);
        $data['password'] = bcrypt($data['password']);
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

    public function export()
    {
        return Excel::download(new DriversExport, 'drivers.xlsx');
    }
}

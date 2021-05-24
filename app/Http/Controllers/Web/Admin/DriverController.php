<?php

namespace App\Http\Controllers\Web\Admin;

use App\Exports\DriversExport;
use App\Exports\StudentsExport;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\QueryFilter\ClientSearch;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class DriverController extends Controller
{
    public function index(){
        $drivers = app(Pipeline::class)
            ->send(Driver::latest()->newQuery())
            ->through([
                ClientSearch::class,
            ])
            ->thenReturn()
            ->paginate(10);
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
            'phone'=>'required|string|max:45',
            'mobile'=>'sometimes|nullable|string|max:45',
            'email'=>'required|email|unique:drivers,email',
            'password'=>'required|min:8',
            'birth_date'=>'required|date',
            'nationality'=>'required|string|max:45',
            'place_of_birth'=>'required|string|max:45',
            'security_number'=>'required|string|max:45',
            'photo'=>'required|file|image|max:10000',
            'licence_number'=>'required|string|max:45',
            'licence_expiration_date'=>'required|date',
            'licence_photo'=>'required|file|image|max:10000',
            'is_available'=>'required|in:on,off',
            'observation'=>'sometimes|nullable|string|max:450',
            'longitude'=>'required|max:90.99999999|min:-90.99999999',
            'latitude'=>'required|max:90.999999|min:-90.99999999'
        ]);

        $data['is_available'] = $request->is_available == 'on';

        if ($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('drivers');
        }
        if ($request->hasFile('licence_photo')){
            $data['licence_photo'] = $request->file('licence_photo')->store('drivers');
        }

        $data['password'] = bcrypt($data['password']);

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
            'password'=>'sometimes|nullable|min:8|confirmed',
            'birth_date'=>'required|date',
            'nationality'=>'required|string|max:45',
            'place_of_birth'=>'required|string|max:45',
            'security_number'=>'required|string|max:45',
            'photo'=>'sometimes|nullable|file|image|max:10000',
            'licence_number'=>'required|string|max:45',
            'licence_expiration_date'=>'required|date',
            'licence_photo'=>'sometimes|nullable|file|image|max:10000',
            'is_available'=>'in:on,off',
            'observation'=>'sometimes|nullable|string|max:450',
            'longitude'=>'required|max:90.99999999|min:-90.99999999',
            'latitude'=>'required|max:90.999999|min:-90.99999999'
        ]);

        $data['is_available'] = $request->is_available == 'on';

        unset($data['password']);
        if (isset($request->password))
        {
            $data['password'] = bcrypt($request->password);
        }

        $driver = Driver::findOrFail($id);

        unset($data['photo']);
        if ($request->hasFile('photo')){
            Storage::delete($driver->photo);
            $data['photo'] = $request->file('photo')->store('drivers');
        }

        unset($data['licence_photo']);
        if ($request->hasFile('licence_photo')){
            Storage::delete($driver->licence_photo);
            $data['licence_photo'] = $request->file('licence_photo')->store('drivers');
        }

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

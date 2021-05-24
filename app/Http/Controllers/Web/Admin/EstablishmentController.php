<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Establishment;
use App\QueryFilter\EstablishmentSearch;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;

class EstablishmentController extends Controller
{
    public function index(){
        $establishments = app(Pipeline::class)
            ->send(Establishment::latest()->newQuery())
            ->through([
                EstablishmentSearch::class,
            ])
            ->thenReturn()
            ->paginate(10);
        return view('admin.establishments.index',compact('establishments'));
    }

    public function create(){
        return view('admin.establishments.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:45',
            'phone'=>'nullable|string',
            'email'=>'nullable|email',
            'address'=>'required|string',
            'observation'=>'nullable|string',
            'longitude'=>'required|max:90.99999999|min:-90.99999999',
            'latitude'=>'required|max:90.999999|min:-90.99999999'
        ]);
        Establishment::create($data);
        session()->flash('success','Établissement créé avec succes');
        return redirect()->route('admin.establishments.index');
    }

    public function show($id){
        $establishment = Establishment::find($id);
        if(!$establishment){
            return abort(404,'Établissement introuvable');
        }
        return view('admin.establishments.show',compact('establishment'));
    }

    public function edit($id){
        $establishment = Establishment::findOrFail($id); // We don't need the if condition
        return view('admin.establishments.edit',compact('establishment'));
    }

    public function update($id,Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:45',
            'phone'=>'nullable|string',
            'email'=>'nullable|email',
            'address'=>'required|string',
            'observation'=>'nullable|string',
            'longitude'=>'required|max:90.99999999|min:-90.99999999',
            'latitude'=>'required|max:90.999999|min:-90.99999999'
        ]);
        $establishment = Establishment::findOrFail($id);
        $establishment->update($data);
        session()->flash('success','Établissement modifié avec succes');
        return redirect()->route('admin.establishments.index');
    }

    public function destroy($id){
        $establishment = Establishment::findOrFail($id);
        $establishment->delete();
        session()->flash('success','Établissement supprimé avec succes');
        return redirect()->route('admin.establishments.index');
    }
}

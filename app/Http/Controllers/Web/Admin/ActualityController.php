<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actuality;
use Illuminate\Http\Request;

class ActualityController extends Controller
{
    public function index(){
        $actualities = Actuality::paginate(10);
        return view('admin.actualities.index',compact('actualities'));
    }

    public function create(){
        return view('admin.actualities.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title'=>'required|string|max:45',
            'content'=>'required|string|max:500',
            'image'=>'sometimes|nullable|file|image|max:10000',
            'is_visible'=>'required|integer'
        ]);

        if (array_key_exists('image',$data))
        {
            $data['image'] = $data['image']->store('news');
        }

        Actuality::create($data);
        session()->flash('success','Actualité crée avec succes');
        return redirect()->route('admin.actualities.index');
    }

    public function show($id){
        $actuality = Actuality::find($id);
        if(!$actuality){
            return abort(404,'Actualité introuvable');
        }
        return view('admin.actualities.show',compact('actuality'));
    }

    public function edit($id){
        $actuality = Actuality::findOrFail($id); // We don't need the if condition
        return view('admin.actualities.edit',compact('actuality'));
    }

    public function update($id,Request $request){
        $data = $request->validate([
            'title'=>'required|string|max:45',
            'content'=>'required|string|max:500',
            'image'=>'sometimes|nullable|file|image|max:10000',
            'is_visible'=>'required|integer'
        ]);
        $actuality = Actuality::findOrFail($id);
        $actuality->update($data);
        session()->flash('success','Actualité modifié avec succes');
        return redirect()->route('admin.actualities.index');
    }

    public function destroy($id){
        $actuality = Actuality::findOrFail($id);
        $actuality->delete();
        session()->flash('success','Actualité supprimé avec succes');
        return redirect()->route('admin.actualities.index');
    }
}

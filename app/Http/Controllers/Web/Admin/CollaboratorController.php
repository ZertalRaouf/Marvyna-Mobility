<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\QueryFilter\CollaboratorSearch;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;

class CollaboratorController extends Controller
{
    public function index(){
        $collaborators = app(Pipeline::class)
            ->send(Collaborator::latest()->newQuery())
            ->through([
                CollaboratorSearch::class,
            ])
            ->thenReturn()
            ->paginate(10);
        return view('admin.collaborators.index',compact('collaborators'));
    }

    public function create(){
        return view('admin.collaborators.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:45',
            'email'=>'required|email',
            'phone'=>'required|string',
            'observation'=>'sometimes|nullable'
        ]);
        Collaborator::create($data);
        session()->flash('success','Collaborateur crée avec succes');
        return redirect()->route('admin.collaborators.index');
    }

    public function show($id){
        $collaborator = Collaborator::find($id);
        if(!$collaborator){
            return abort(404,'Collaborateur introuvable');
        }
        return view('admin.collaborators.show',compact('collaborator'));
    }

    public function edit($id){
        $collaborator = Collaborator::findOrFail($id); // We don't need the if condition
        return view('admin.collaborators.edit',compact('collaborator'));
    }

    public function update($id,Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:45',
            'email'=>'required|email',
            'phone'=>'required|string',
            'observation'=>'sometimes|nullable'
        ]);
        $collaborator = Collaborator::findOrFail($id);
        $collaborator->update($data);
        session()->flash('success','Collaborateur modifié avec succes');
        return redirect()->route('admin.collaborators.index');
    }

    public function destroy($id){
        $collaborator = Collaborator::findOrFail($id);
        $collaborator->delete();
        session()->flash('success','Collaborateur supprimé avec succes');
        return redirect()->route('admin.collaborators.index');
    }
}

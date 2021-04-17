<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:45',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);
        User::create($data);
        session()->flash('success','utilisateur crée avec succes');
        return redirect()->route('admin.users.index');
    }

    public function show($id){
        $user = User::find($id);
        if(!$user){
            return abort(404,'Utilisateur introuvable');
        }
        return view('admin.users.show',compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id); // We don't need the if condition
        return view('admin.users.edit',compact('user'));
    }

    public function update($id,Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:45',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:8|confirmed'
        ]);
        $user = User::findOrFail($id);
        $user->update($data);
        session()->flash('success','utilisateur modifié avec succes');
        return redirect()->route('admin.users.index');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success','utilisateur supprimé avec succes');
        return redirect()->route('admin.users.index');
    }

}

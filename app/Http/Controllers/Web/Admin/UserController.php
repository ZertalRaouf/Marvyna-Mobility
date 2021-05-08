<?php

namespace App\Http\Controllers\Web\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
            'civility'=>'required|string',
            'name'=>'required|string|max:45',
            'address'=>'required|string',
            'phone'=>'required|string',
            'mobile'=>'sometimes|nullable|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'observation'=>'sometimes|nullable|max:450'
        ]);
        User::create($data);
        session()->flash('success','Utilisateur créé avec succes');
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
            'civility'=>'required|string',
            'name'=>'required|string|max:45',
            'address'=>'required|string',
            'phone'=>'required|string',
            'mobile'=>'sometimes|nullable|string',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'sometimes|nullable|min:8|confirmed',
            'observation'=>'sometimes|nullable|max:450'
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::findOrFail($id);
        $user->update($data);
        session()->flash('success','Utilisateur modifié avec succes');
        return redirect()->route('admin.users.index');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success','Utilisateur supprimé avec succes');
        return redirect()->route('admin.users.index');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}

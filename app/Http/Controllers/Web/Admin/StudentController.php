<?php

namespace App\Http\Controllers\Web\Admin;

use App\Exports\StudentsExport;
use App\Http\Controllers\Controller;
use App\Models\Establishment;
use App\Models\Student;
use App\Models\User;
use App\QueryFilter\ClientSearch;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\Parent_;

class StudentController extends Controller
{
    public function index(){
        $students = app(Pipeline::class)
            ->send(Student::latest()->newQuery())
            ->through([
                ClientSearch::class,
            ])
            ->thenReturn()
            ->paginate(10);
        return view('admin.students.index',compact('students'));
    }

    public function create(){
        $parents = User::all();
        $establishments = Establishment::all();
        return view('admin.students.create',compact('parents','establishments'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'civility'=>'required|string',
            'first_name'=>'required|string|max:45',
            'last_name'=>'required|string|max:45',
            'birth_date'=>'required|date',
            'enter_date'=>'required|date',
            'leave_date'=>'required|date',
            'photo'=>'sometimes|nullable|file|image|max:10000',
            'observation'=>'sometimes|nullable|string',
            'specificity'=>'sometimes|nullable|string',
            'disability'=>'sometimes|nullable|string',
            'parents'=>'required|array',
            'parents.*'=>'required|integer',
            'establishments'=>'required|array',
            'establishments.*'=>'required|integer',
        ]);
        if ($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('students');
        }
        $students = Student::create($data);
        $students->users()->attach($data['parents']);
        $students->establishments()->attach($data['establishments']);
        session()->flash('success','Étudiant crée avec succes');
        return redirect()->route('admin.students.index');
    }

    public function show($id){
        $student = Student::with(['users','establishments'])->findOrFail($id); // We don't need the if condition
        return view('admin.students.show',compact('student'));
    }

    public function edit($id){
        $student = Student::with(['users:id','establishments:id'])->findOrFail($id); // We don't need the if condition
        $parents = User::all();
        $establishments = Establishment::all();
        return view('admin.students.edit',compact('student','parents','establishments'));
    }

    public function update($id,Request $request){
        $data = $request->validate([
            'civility'=>'required|string',
            'first_name'=>'required|string|max:45',
            'last_name'=>'required|string|max:45',
            'birth_date'=>'required|date',
            'enter_date'=>'required|date',
            'leave_date'=>'required|date',
            'photo'=>'sometimes|nullable|file|image|max:10000',
            'observation'=>'sometimes|nullable|string',
            'specificity'=>'sometimes|nullable|string',
            'disability'=>'sometimes|nullable|string',
            'parents'=>'required|array',
            'parents.*'=>'required|integer',
            'establishments'=>'required|array',
            'establishments.*'=>'required|integer',
        ]);
        if ($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('students');
        }
        $student = Student::findOrFail($id);
        $student->update($data);
        $student->users()->sync($data['parents']);
        $student->establishments()->sync($data['establishments']);

        session()->flash('success','Étudiant modifié avec succes');
        return redirect()->route('admin.students.index');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        session()->flash('success','Étudiant supprimé avec succes');
        return redirect()->route('admin.students.index');
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}

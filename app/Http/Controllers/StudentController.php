<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    private $columns = ['studentName', 'age'];
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::get();
        return view('Students', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addStudent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // $student = new Student();
         // $student->studentName = $request->studentName;
         // $student->age = $request->age;
         // $student->save();
         //Student::create($request->only($this->columns));
         $data = $request->validate([
            'studentName' => 'required|max:100|min:3',
            'age' =>'required|max:2',
           ]);
           Student::create($data);
           return redirect('Students');
        }
         //return redirect('Students');
        // return 'Inserted Successfully';

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('showStudent', compact('student')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('editStudent', compact('student'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'studentName' => 'required|max:100|min:3',
            'age' =>'required|max:2',
           ]);
           $student = Student::findOrFail($id);
           $student->update($data);
           return redirect('Students');
        //Student::where('id', $id)->update($request->only($this->columns));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Student::where('id', $id)->delete();
        return redirect('Students');
    }

    /**
     * Trash the specified resource.
     */

    public function trash()
    {
       $trashed = Student::onlyTrashed()->get();
       return view('trashStudent', compact('trashed'));
    }

    /**
     * Restore.
     */
    //public function restore(string $id)
    //{
    // Student::where('id', $id)->restore();
    // return redirect('Students');
    //}
    // In (trashStudent.blade.php)<td><a href="{{ route('restoreClient', $client->id) }}">Restore</a></td>

    /**
     * Restore with more security.
     */
    public function restore(Request $request)
    {
        $id = $request->id;
        Student::where('id', $id)->restore();
        return redirect('Students');
    }
    /**
     * ForceDelete
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Student::where('id', $id)->forceDelete();
        return redirect('trashStudent');
    }
}
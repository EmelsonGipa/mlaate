<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::all();
        return view('home', ['students' => $students, 'title' => 'All Students']);
    }

    // Show active students only
    public function active()
    {
        $students = Student::active()->get();
        return view('home', ['students' => $students, 'title' => 'Active Students']);
    }

    // Show Gmail students only
    public function gmail()
    {
        $students = Student::gmail()->get();
        return view('home', ['students' => $students, 'title' => 'Gmail Students']);
    }

    // Add a new student
    public function store(Request $request)
    {
        $student = new Student();
        $student->name    = $request->name;
        $student->age     = $request->age;
        $student->address = $request->address;
        $student->email   = $request->email;
        $student->status  = $request->status;
        $student->save();

        return redirect('/home');
    }

    // Update a student
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name    = $request->name;
        $student->age     = $request->age;
        $student->address = $request->address;
        $student->email   = $request->email;
        $student->status  = $request->status;
        $student->save();

        return redirect('/home');
    }

    // Delete a student
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/home');
    }
}
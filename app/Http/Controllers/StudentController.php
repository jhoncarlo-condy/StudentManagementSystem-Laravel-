<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentName;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::all();
        // or this query
        $students = Student::with('students_name')->get();
        return view('layouts.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Student::all('students_name_id')->last()->count();
        $student = new Student;
        $request->validate([
            'stud_id'=> 'required',
            'FirstName'=> 'required',
            'LastName'=> 'required',
            'age'=> 'required',
            'grade_level'=> 'required',


        ]);
        $student->stud_id = $request->stud_id;
        $student->students_name_id = $count+1;
        $student->age = $request->age;
        $student->grade_level = $request->grade_level;
        $student->save();

        StudentName::create($request->all());
        return redirect()->back()->with(['message'=>'Added New Student']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $student = Student::find($student->id);
        return view('students.index',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'stud_id'=>'required',
            'FirstName'=>'required',
            'LastName'=>'required',
            'age'=>'required',
            'grade_level'=>'required',
        ]);

        Student::find($student->id)->update($request->all());

        StudentName::find($student->students_name->id)->update($request->all());
        return redirect()->back()->with(['message' => 'Success updating student']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::find($student->id)->destroy();
        Student::find($student->students_name->id)->destroy();
        return redirect()->back()->with(['message' => 'Student Info Deleted']);
    }
}

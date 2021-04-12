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

        $request->validate([
            'stud_id'=> 'required',
            'FirstName'=> 'required',
            'LastName'=> 'required',
            'age'=> 'required',
            'grade_level'=> 'required',


        ]);
        $studentname = new StudentName;
        $studentname->FirstName = $request->FirstName;
        $studentname->MiddleName = $request->MiddleName;
        $studentname->LastName = $request->LastName;
        $studentname->save();
        $students_name_id = $studentname->id;

        $student = new Student;
        $student->stud_id = $request->stud_id;
        $student->students_name_id = $students_name_id;
        $student->age = $request->age;
        $student->grade_level = $request->grade_level;
        $student->save();

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

        StudentName::find($student->students_name->id)->delete();
        Student::find($student->id)->delete();
        return redirect()->back()->with(['message' => 'Student Info Deleted']);
    }
}

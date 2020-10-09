<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $students = Student::all();
      return view('pages.student.index',['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $classrooms = Classroom::all();
      return view('pages.student.create',['classrooms' => $classrooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'nis' => 'required',
        'birthdate' => 'required',
        'gender' => 'required',
        'year' => 'required',
        'class' => 'required',
        'address' => 'required',
      ]);

      DB::table('students')->insert([
        'nis' => $request->nis,
        'name' => $request->name,
        'birth_date' => $request->birthdate,
        'address' => $request->address,
        'gender' => $request->gender,
        'academic_year' => $request->year,
        'classroom_id' => $request->class,
      ]);

      return redirect(route('siswa.index'))->with('status','Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $student = Student::findOrFail($id);
      $classroom = Classroom::find($student->classroom_id);
      return view('pages.student.show',['student' => $student, 'classroom' => $classroom]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $classrooms = Classroom::all();
      $student = Student::findOrFail($id);
      return view('pages.student.edit',['classrooms' => $classrooms, 'student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'name' => 'required',
        'nis' => 'required',
        'birthdate' => 'required',
        'gender' => 'required',
        'year' => 'required',
        'class' => 'required',
        'address' => 'required',
      ]);

      DB::table('students')->where('id', $id)->update([
        'nis' => $request->nis,
        'name' => $request->name,
        'birth_date' => $request->birthdate,
        'address' => $request->address,
        'gender' => $request->gender,
        'academic_year' => $request->year,
        'classroom_id' => $request->class,
      ]);

      return redirect(route('siswa.index'))->with('status','Data siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('students')->where('id', $id)->delete();
      return redirect(route('siswa.index'))->with('status','Data siswa berhasil dihapus');
    }
}

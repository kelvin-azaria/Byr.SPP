<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $classroom = Classroom::all();
    return view('pages.classroom.index',['classrooms' => $classroom]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $teachers = Teacher::all();
    return view('pages.classroom.create',['teachers' => $teachers]);
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
      'teacher' => 'required',
    ]);

    $classroom = new Classroom;
    $classroom->name = $request->name;
    $classroom->teacher_id = $request->teacher;
    $classroom->save();

    return redirect(route('kelas.index'))->with('status','Data kelas berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $classroom = Classroom::findOrFail($id);
    $teacher = Teacher::find($classroom->teacher_id);
    return view('pages.classroom.show',['classroom' => $classroom, 'teacher' => $teacher]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $classroom = Classroom::findOrFail($id);
    $teachers = Teacher::all();
    return view('pages.classroom.edit',['classroom' => $classroom, 'teachers' => $teachers]);
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
      'teacher' => 'required',
    ]);

    $classroom = Classroom::find($id);
    $classroom->name = $request->name;
    $classroom->teacher_id = $request->teacher;
    $classroom->save();
    
    return redirect(route('kelas.index'))->with('status','Data kelas berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Classroom::destroy($id);
    return redirect(route('kelas.index'))->with('status','Data kelas berhasil dihapus');
  }
}

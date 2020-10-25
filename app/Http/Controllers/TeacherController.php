<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $teachers = Teacher::all();
      return view('pages.teacher.index',['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.teacher.create');
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
        'nip' => 'required',
        'phone' => 'required',
        'birthdate' => 'required',
        'gender' => 'required',
        'address' => 'required',
      ]);

      $teacher = new Teacher;
      $teacher->name = $request->name;
      $teacher->nip = $request->nip;
      $teacher->phone = $request->phone;
      $teacher->birth_date = $request->birthdate;
      $teacher->gender = $request->gender;
      $teacher->address = $request->address;
      $teacher->save();
      
      return redirect(route('guru.index'))->with('status','Data kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $teacher = Teacher::findOrFail($id);
      return view('pages.teacher.show',['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $teacher = Teacher::findOrFail($id);
      return view('pages.teacher.edit',['teacher' => $teacher]);
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
        'nip' => 'required',
        'phone' => 'required',
        'birthdate' => 'required',
        'gender' => 'required',
        'address' => 'required',
      ]);

      $teacher = Teacher::find($id);
      $teacher->name = $request->name;
      $teacher->nip = $request->nip;
      $teacher->phone = $request->phone;
      $teacher->birth_date = $request->birthdate;
      $teacher->gender = $request->gender;
      $teacher->address = $request->address;
      $teacher->save();

      return redirect(route('guru.index'))->with('status','Data kelas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\SchoolFee;
use App\Student;
use Illuminate\Http\Request;

class SchoolFeeController extends Controller
{
    public function search()
    {
      return view('pages.school_fee.search');
    }

    public function result(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
      ]);

      $students = Student::join('classrooms','classrooms.id','=','students.classroom_id')
        ->where('students.name', 'LIKE', '%'.$request->name.'%')
        ->select('students.id','students.name','students.nis','students.gender','classrooms.name AS classroom')
        ->take(6)
        ->get();
      return view('pages.school_fee.search', ['students' => $students]);
    }

    public function index($id)
    {
      $fees = SchoolFee::where('student_id',$id)->get();
      dd($fees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

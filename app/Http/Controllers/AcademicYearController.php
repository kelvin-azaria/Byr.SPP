<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $academic_years = AcademicYear::all();
      return view('pages.academic_year.index',['academic_years' => $academic_years]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.academic_year.create');
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
        'year' => 'required|min:4|max:4',
        'fee' => 'required',
      ]);

      $academic_year = new AcademicYear;
      $academic_year->year = $request->year;
      $academic_year->fee = $request->fee;
      $academic_year->save();

      return redirect(route('tahun.index'))->with('status','Data tahun pembelajaran berhasil ditambahkan');
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
      $academic_year = AcademicYear::findOrFail($id);
      return view('pages.academic_year.edit',['academic_year' => $academic_year]);
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
        'year' => 'required|min:4|max:4',
        'fee' => 'required',
      ]);

      $academic_year = AcademicYear::findOrFail($id);
      $academic_year->year = $request->year;
      $academic_year->fee = $request->fee;
      $academic_year->save();

      return redirect(route('tahun.index'))->with('status','Data tahun pembelajaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $academic_year = AcademicYear::destroy($id);
      return redirect(route('tahun.index'))->with('status','Data tahun pembelajaran berhasil dihapus');
    }
}

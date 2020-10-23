<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\Classroom;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      $students = DB::table('students')
        ->join('classrooms','students.classroom_id','=','classrooms.id')
        ->select('students.*','classrooms.name AS classroom_name')
        ->get();
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
      $academic_year = AcademicYear::all();
      return view('pages.student.create',['classrooms' => $classrooms, 'academic_year' => $academic_year]);
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

      $student_id = DB::table('students')->insertGetId([
        'nis' => $request->nis,
        'name' => $request->name,
        'birth_date' => $request->birthdate,
        'address' => $request->address,
        'gender' => $request->gender,
        'academic_year_id' => $request->year,
        'classroom_id' => $request->class,
      ]);

      $pay_date = $request->year."-06-10";
      $month = 7;
      $year = AcademicYear::find($request->year);

      for ($i=1; $i <= 12; $i++) {

        if ($month > 12) {
          $month = 1;
        }

        $monthly_date = date("Y-m-d", strtotime("+$i month" , strtotime($pay_date)));

        $receipt = (str_replace("-","",$monthly_date)).strval($student_id);
        
        DB::table('school_fees')->insert([
          'due_date' => $monthly_date,
          'month' => $month,
          'receipt_number' => $receipt,
          'payment_date' => $request->address,
          'amount' => $year->fee,
          'status' => 'BELUM LUNAS',
          'student_id' => $student_id,
          'user_id' => Auth::id()
        ]);

        $month++;
      }

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
      $academic_year = AcademicYear::all();
      $student = Student::findOrFail($id);
      return view('pages.student.edit',[
        'classrooms' => $classrooms,
        'student' => $student,
        'academic_year' => $academic_year
      ]);
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
        'academic_year_id' => $request->year,
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
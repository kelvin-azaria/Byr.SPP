<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\Classroom;
use App\SchoolFee;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

      $student = new Student;
      $student->nis = $request->nis;
      $student->name = $request->name;
      $student->birth_date = $request->birthdate;
      $student->address = $request->address;
      $student->gender = $request->gender;
      $student->academic_year_id = $request->year;
      $student->classroom_id = $request->class;
      $student->save();

      $this->generateSchoolFees($student, $request->year);

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
      $student = Student::find($id);
      return view('pages.student.show',['student' => $student]);
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

      $student = Student::find($id);

      if ($student->academic_year_id !== $request->year) {
        $student->nis = $request->nis;
        $student->name = $request->name;
        $student->birth_date = $request->birthdate;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->academic_year_id = $request->year;
        $student->classroom_id = $request->class;
        $student->save();

        $this->generateSchoolFees($student, $request->year);
      } else {
        $student->nis = $request->nis;
        $student->name = $request->name;
        $student->birth_date = $request->birthdate;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->academic_year_id = $request->year;
        $student->classroom_id = $request->class;
        $student->save();
      }

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
      $fees = SchoolFee::where('student_id',$id)->delete();
      $student = Student::destroy($id);
      return redirect(route('siswa.index'))->with('status','Data siswa berhasil dihapus');
    }
    
    private function generateSchoolFees($student, $year_id)
    {
      $student_id = $student->id;
      $year = AcademicYear::find($year_id);

      $pay_date = $year->year."-06-10";
      $month = 7;

      for ($i=1; $i <= 12; $i++) {

        if ($month > 12) {
          $month = 1;
        }

        $monthly_date = date("Y-m-d", strtotime("+$i month" , strtotime($pay_date)));

        $receipt = (str_replace("-","",$monthly_date)).strval($student_id);

        $school_fee = new SchoolFee;
        $school_fee->due_date = $monthly_date;
        $school_fee->month = $month;
        $school_fee->receipt_number = $receipt;
        $school_fee->amount = $year->fee;
        $school_fee->status = 'BELUM LUNAS';
        $school_fee->student_id = $student_id;
        $school_fee->user_id = Auth::id();
        $school_fee->save();

        $month++;
      }
    }
}

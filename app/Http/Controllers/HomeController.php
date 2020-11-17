<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\SchoolFee;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $student_count = Student::all()->count();
    $teacher_count = Teacher::all()->count();
    $classroom_count = Classroom::all()->count();
    $report_count = SchoolFee::join('students','students.id','=','school_fees.student_id')
        ->whereMonth('school_fees.updated_at','=',date('m'))
        ->select('students.name','school_fees.payment_date','school_fees.amount','school_fees.month','school_fees.receipt_number')
        ->count();

    return view('pages.home',[
      'student_count' => $student_count,
      'report_count' => $report_count,
      'teacher_count' => $teacher_count,
      'classroom_count' => $classroom_count,
    ]);
  }
}

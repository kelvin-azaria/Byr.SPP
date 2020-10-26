<?php

namespace App\Http\Controllers;

use App\SchoolFee;
use App\Student;
use Carbon\Carbon;
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
      $student = Student::findOrFail($id);
      return view('pages.school_fee.index', ['fees' => $fees, 'student' => $student]);
    }

    public function pay($id)
    {
      $fee = SchoolFee::findOrFail($id);
      $fee->status = "LUNAS";
      $fee->payment_date = Carbon::now();
      $fee->save();

      return redirect()->back()->with('status','Transaksi pada bulan '.date("F", mktime(0, 0, 0, $fee->month, 10)).' berhasil dilakukan');;
    }

    public function cancel($id)
    {
      $fee = SchoolFee::findOrFail($id);
      $fee->status = "BELUM LUNAS";
      $fee->payment_date = null;
      $fee->save();

      return redirect()->back()->with('status','Transaksi pada bulan '.date("F", mktime(0, 0, 0, $fee->month, 10)).' berhasil dibatalkan');
    }
}

<?php

namespace App\Http\Controllers;

use App\SchoolFee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function daily()
    {
      $reports = SchoolFee::join('students','students.id','=','school_fees.student_id')
        ->whereDay('school_fees.updated_at', date('d'))
        ->select('students.name','school_fees.payment_date','school_fees.amount','school_fees.month','school_fees.receipt_number')
        ->get();

      return view('pages.report.history',['reports' => $reports]);
    }

    public function monthly()
    {
      $reports = SchoolFee::join('students','students.id','=','school_fees.student_id')
        ->whereMonth('school_fees.updated_at','=',date('m'))
        ->select('students.name','school_fees.payment_date','school_fees.amount','school_fees.month','school_fees.receipt_number')
        ->get();

      return view('pages.report.history',['reports' => $reports]);
    }

    public function yearly()
    {
      $reports = SchoolFee::join('students','students.id','=','school_fees.student_id')
        ->whereYear('school_fees.updated_at','=',date('Y'))
        ->where('school_fees.status','=','LUNAS')
        ->select('students.name','school_fees.payment_date','school_fees.amount','school_fees.month','school_fees.receipt_number')
        ->get();

      return view('pages.report.history',['reports' => $reports]);
    }
}

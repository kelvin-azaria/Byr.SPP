<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\SchoolFee;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function daily()
    {
      $reports = SchoolFee::join('students','students.id','=','school_fees.student_id')
        ->whereDay('school_fees.updated_at', date('d'))
        ->select('students.name','school_fees.payment_date','school_fees.amount','school_fees.month','school_fees.receipt_number')
        ->get();

      return view('pages.report.history',['reports' => $reports, 'type' => 'daily']);
    }

    public function monthly()
    {
      $reports = SchoolFee::join('students','students.id','=','school_fees.student_id')
        ->whereMonth('school_fees.updated_at','=',date('m'))
        ->select('students.name','school_fees.payment_date','school_fees.amount','school_fees.month','school_fees.receipt_number')
        ->get();

      return view('pages.report.history',['reports' => $reports, 'type' => 'monthly']);
    }

    public function yearly()
    {
      $reports = SchoolFee::join('students','students.id','=','school_fees.student_id')
        ->whereYear('school_fees.updated_at','=',date('Y'))
        ->where('school_fees.status','=','LUNAS')
        ->select('students.name','school_fees.payment_date','school_fees.amount','school_fees.month','school_fees.receipt_number')
        ->get();

      return view('pages.report.history',['reports' => $reports, 'type' => 'yearly']);
    }

    public function generate($type)
    {
      PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

      if ($type === 'daily') {
        $data = [
          'payments' => SchoolFee::orderBy('updated_at','DESC')
          ->where('status','LUNAS')
          ->whereMonth('updated_at',date('d'))
          ->get()
        ];
      } elseif ($type === 'monthly') {
        $data = [
          'payments' => SchoolFee::orderBy('updated_at','DESC')
          ->where('status','LUNAS')
          ->whereMonth('updated_at',date('m'))
          ->get()
        ];
      } elseif ($type === 'yearly') {
        $data = [
          'payments' => SchoolFee::orderBy('updated_at','DESC')
          ->where('status','LUNAS')
          ->whereMonth('updated_at',date('Y'))
          ->get()
        ];
      }
      
      $pdf = PDF::loadview('pdf.report',$data);
      return $pdf->download('Laporan_SPP_'.date('M').'_'.date('Y'));
    }
}

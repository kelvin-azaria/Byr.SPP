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
      $reports = SchoolFee::orderBy('updated_at','DESC')
        ->where('status','LUNAS')
        ->whereDay('updated_at',date('d'))
        ->get();

      return view('pages.report.index',['reports' => $reports, 'type' => 'daily']);
    }

    public function monthly()
    {
      $reports = SchoolFee::orderBy('updated_at','DESC')
        ->where('status','LUNAS')
        ->whereMonth('updated_at',date('m'))
        ->get();

      return view('pages.report.index',['reports' => $reports, 'type' => 'monthly']);
    }

    public function yearly()
    {
      $reports = SchoolFee::orderBy('updated_at','DESC')
        ->where('status','LUNAS')
        ->whereYear('updated_at',date('Y'))
        ->get();

      return view('pages.report.index',['reports' => $reports, 'type' => 'yearly']);
    }

    public function generate($type)
    {
      PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

      if ($type === 'daily') {
        $data = [
          'payments' => SchoolFee::orderBy('updated_at','DESC')
          ->where('status','LUNAS')
          ->whereDay('updated_at',date('d'))
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
          ->whereYear('updated_at',date('Y'))
          ->get()
        ];
      }
      
      $pdf = PDF::loadview('pdf.report',$data);
      return $pdf->download('Laporan_SPP_'.date('M').'_'.date('Y'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Student;
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
    return view('pages.home',['student_count' => $student_count]);
  }
}

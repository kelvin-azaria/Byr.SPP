@extends('layout')

@section('title')
	<title>Byr.SPP - Detail Data {{ $student->name }}</title>
@endsection

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Data Siswa</h1>
    <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12 mb-4">
      <div class="card shadow mb-4 p-4">
        <div class="col-12">
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">NIS</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $student->nis }}</div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Nama</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $student->name }}</div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Tanggal Lahir</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ date_format(date_create($student->birth_date),"d F Y") }}</div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Jenis Kelamin</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">
              @if ($student->gender === "M")
                Laki - laki
              @else
                Perempuan
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Tahun Masuk</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $student->academic_year }}</div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Kelas</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $classroom->name }}</div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Alamat</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $student->address }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
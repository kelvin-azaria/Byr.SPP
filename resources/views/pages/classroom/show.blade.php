@extends('layout')

@section('title')
	<title>Byr.SPP - Detail Data Kelas {{ $classroom->name }}</title>
@endsection

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Data Kelas</h1>
    <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12 mb-4">
      <div class="card shadow mb-2 p-4">
        <div class="col-12">
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Nama Kelas</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $classroom->name }}</div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Wali Kelas</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $teacher->name }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 d-flex">
      <a class="btn btn-warning text-dark" href="{{ route('kelas.edit', $classroom->id) }}" role="button">
        <i class="fa fa-edit" aria-hidden="true"></i> Ubah
      </a>
      <form method="POST" action="{{ route('kelas.destroy', $classroom->id) }}" class="form-inline">
        @csrf
        @method('delete')

        <button class="btn btn-danger ml-1" onclick="return confirm('Yakin ingin menghapus data?');">
          <i class="fa fa-trash" aria-hidden="true"></i> Hapus
        </button>
      </form>
    </div>
  </div>

</div>
@endsection
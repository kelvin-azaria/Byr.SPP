@extends('layout')

@section('title')
	<title>Byr.SPP - Tambah Data Petugas</title>
@endsection

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Petugas</h1>
    <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
  </div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12 mb-4">
      <div class="card shadow mb-4 p-4">
        <div class="col-12">
          <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('pages.user._form')

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
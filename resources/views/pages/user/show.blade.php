@extends('layout')

@section('title')
	<title>Byr.SPP - Detail Data Petugas - {{ $user->name }}</title>
@endsection

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Data Petugas - {{ $user->name }}</h1>
    <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12 mb-4">
      <div class="card shadow mb-2 p-4">
        <div class="col-12">
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Nama</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $user->name }}</div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">E-mail</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $user->email }}</div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Peran</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $user->is_admin ? 'Administrator' : 'Petugas' }}</div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2 font-weight-bold">Status Akun</div>
            <div class="col-lg-1 font-weight-bold">:</div>
            <div class="col-lg-9">{{ $user->approved ? 'Aktif' : 'Tidak Aktif' }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 d-flex">
      @if ($user->approved)
        <a class="btn btn-danger" href="{{ route('petugas.disapprove', $user->id) }}" role="button">
          <i class="fa fa-times" aria-hidden="true"></i> Non-aktifkan Akun Ini
        </a>
      @else
        <a class="btn btn-success" href="{{ route('petugas.approve', $user->id) }}" role="button">
          <i class="fa fa-check" aria-hidden="true"></i> Aktifkan Akun Ini
        </a>
      @endif
      
      <a class="btn btn-warning text-dark ml-2" href="{{ route('petugas.edit', $user->id) }}" role="button">
        <i class="fa fa-edit" aria-hidden="true"></i> Ubah
      </a>
      <form method="POST" action="{{ route('petugas.destroy', $user->id) }}" class="form-inline">
        @csrf
        @method('delete')

        <button class="btn btn-danger ml-2" onclick="return confirm('Yakin ingin menghapus data?');">
          <i class="fa fa-trash" aria-hidden="true"></i> Hapus
        </button>
      </form>
    </div>
  </div>

</div>
@endsection
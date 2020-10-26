@extends('layout')

@section('title')
	<title>Byr.SPP - Cari Siswa</title>
@endsection

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cari Siswa</h1>
  </div>
  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <form class="form-inline" action="{{ route('spp.search') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
              <label for="name">Nama Siswa</label>
            </div>
            <div class="form-group col-sm-6 mb-2">
              <input type="text" name="name" class="form-control w-100 @error('name') is-invalid @enderror" id="name" placeholder="Masukan nama siswa">
            </div>
            <button type="submit" class="btn btn-success mb-2">
              <i class="fa fa-search" aria-hidden="true"></i> Cari Siswa
            </button>
          </form>
        </div>
      </div>
    </div>
    
  </div>
  
  @include('pages.school_fee._result')

</div>
@endsection
@extends('layouts.app')

@section('title')
	<title>Byr.SPP - Halaman Tidak Ditemukan</title>
@endsection

@section('content')
<div class="container-fluid">

  <!-- Alert Message -->
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <span>{{ session('status') }}</span> 
    </div>   
  @endif
  
  <script>
    $(".alert").alert();
  </script>
  <!-- Content Row -->
  <div class="row justify-content-center h-100">
    <div class="col-md-8 col-sm-12 my-auto">
      <div class="card shadow">
        <div class="card-header text-center">
          <strong>Error</strong>
        </div>
        <div class="card-body p-4">
          <div class="text-center">
            <div class="error mx-auto d-flex" data-text="500">500</div>
            <p class="lead text-gray-800">Mohon Maaf</p>
            <p class="lead text-gray-800 mb-4">Saat ini sedang ada kendala teknis pada server kami. Harap tunggu beberapa saat</p>
            <a href="{{ route('home') }}">&larr; Kembali ke Dashboard</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
@extends('layout')

@section('title')
	<title>Byr.SPP - Riwayat Pembayaran (Harian)</title>
@endsection

@section('css')
  <link href="{{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
@endsection

@section('content')
@php
  setlocale(LC_ALL, 'id_ID.utf8');
@endphp
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat Pembayaran</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-download fa-sm text-white-50"></i> Buat Laporan
    </a>
  </div>

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
  <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-body">
          @if ($reports === null || $reports === "")
            <h1 class="text-center">EMPTY</h1>
          @else
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Tahun</th>
                  <th>Biaya SPP</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Jumlah Bayar</th>
                  <th>Bulan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Tahun</th>
                  <th>Biaya SPP</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Jumlah Bayar</th>
                  <th>Bulan</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($reports as $id => $details)
                  <tr>
                    <td>{{ $details->receipt_number }}</td>
                    <td>{{ $details->name }}</td>
                    <td>{{ date_format(date_create($details->payment_date), "d/m/Y") }}</td>
                    <td>Rp.{{ $details->amount }}</td>
                    <td>{{ strftime("%B", mktime(0, 0, 0, $details->month, 10)) }}</td>
                  </tr>  
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
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
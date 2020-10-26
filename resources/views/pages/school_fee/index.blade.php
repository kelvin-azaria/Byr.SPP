@extends('layout')

@section('title')
	<title>Byr.SPP - Data SPP Siswa</title>
@endsection

@section('content')
@php
  setlocale(LC_ALL, 'id_ID.utf8');
@endphp
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data SPP <span class="text-primary font-weight-bold">{{ $student->name }}</span></h1>
    <a href="{{ route('spp.search') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
  </div>

  <!-- Alert -->
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <span>{{ session('status') }}</span> 
    </div>   
  @endif

  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No. Transaksi</th>
                <th>Bulan</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Bayar</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No. Transaksi</th>
                <th>Bulan</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Bayar</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($fees as $id => $details)
                <tr>
                  <td>{{ $details->receipt_number }}</td>
                  <td>{{ strftime("%B", mktime(0, 0, 0, $details->month, 10)) }}</td>
                  <td>{{ $details->due_date }}</td>
                  <td>{{ $details->payment_date === null ? "-" : $details->payment_date }}</td>
                  <td>Rp.{{ $details->amount }}</td>
                  <td>{{ $details->status }}</td>
                  <td>
                    @if ($details->status === "LUNAS")
                      <a href="{{ route('spp.cancel_pay', $details->id) }}" class="btn btn-danger ml-3" style="width: 48px">
                        <i class="fa fa-times" aria-hidden="true"></i>
                      </a>
                    @else
                      <a href="{{ route('spp.pay', $details->id) }}" class="btn btn-success ml-3" style="width: 48px">
                        <i class="fa fa-check" aria-hidden="true"></i>
                      </a>  
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
    
  </div>
  

</div>
@endsection
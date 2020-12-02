@extends('layouts.app')

@section('title')
	<title>Byr.SPP - Histori SPP Siswa</title>
@endsection

@section('css')
  <link href="{{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
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
  <div class="row m-4">
    <div class="col-xl-12 col-md-12 col-sm-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-body">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
              Data SPP <span class="text-primary font-weight-bold">{{ $student->name }}</span>
            </h1>
            <a href="{{ route('login') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fa fa-arrow-left fa-sm text-white-50"></i> Keluar
            </a>
          </div>
          @if ($student === null || $student === "")
            <h1 class="text-center">EMPTY</h1>
          @else
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No. Transaksi</th>
                  <th>Bulan</th>
                  <th>Jatuh Tempo</th>
                  <th>Tanggal Bayar</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
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
                </tr>
              </tfoot>
              <tbody>
                @foreach ($fees as $id => $details)
                  <tr>
                    <td>{{ $details->receipt_number }}</td>
                    <td>{{ strftime("%B", mktime(0, 0, 0, $details->month, 10)) }}</td>
                    <td>{{ date_format(date_create($details->due_date), "d/m/Y") }}</td>
                    <td>{{ $details->payment_date === null ? "-" : date_format(date_create($details->payment_date), "d/m/Y") }}</td>
                    <td>Rp.{{ $details->amount }}</td>
                    <td class="text-center">
                      @if ($details->status === 'LUNAS')
                        <span class="text-success font-weight-bold">LUNAS</span>
                      @else
                      <span class="text-secondary font-weight-bold">BELUM LUNAS</span>
                      @endif
                    </td>
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
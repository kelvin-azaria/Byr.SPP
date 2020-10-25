@extends('layout')

@section('title')
	<title>Byr.SPP - Guru</title>
@endsection

@section('css')
  <link href="{{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Guru</h1>
    <a href="{{ route('guru.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Guru
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
          @if ($teachers === null || $teachers === "")
            <h1 class="text-center">EMPTY</h1>
          @else
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIP</th>
                  <th>Nama Guru</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NIP</th>
                  <th>Nama Guru</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($teachers as $id => $details)
                  <tr>
                    <td>{{ $details->nip }}</td>
                    <td>{{ $details->name }}</td>
                    @if ($details->gender === 'M')
                      <td>Laki-laki</td>
                    @else
                      <td>Perempuan</td>
                    @endif
                    <td>{{ date_format(date_create($details->birth_date), "d/m/Y") }}</td>
                    <td class="d-flex justify-content-center">
                      <a href="{{ route('guru.show', $details->id) }}" class="btn btn-primary mr-2">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      <a href="{{ route('guru.edit', $details->id) }}" class="btn btn-warning">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                      </a>
                      <form method="POST" action="{{ route('guru.destroy', $details->id) }}" class="form-inline">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger ml-2" onclick="return confirm('Yakin ingin menghapus data?');">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                      </form>
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
@extends('layout')

@section('title')
	<title>Byr.SPP - Kelas</title>
@endsection

@section('css')
  <link href="{{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelas</h1>
    <a href="{{ route('kelas.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Kelas</a>
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

  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-body">
          @if ($classrooms === null || $classrooms === "")
            <h1 class="text-center">EMPTY</h1>
          @else
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama Kelas</th>
                  <th>Wali Kelas</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nama Kelas</th>
                  <th>Wali Kelas</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($classrooms as $id => $details)
                  <tr>
                    <td>{{ $details->name }}</td>
                    <td>{{ $details->teacher_name }}</td>
                    <td class="d-flex justify-content-center">
                      <a href="{{ route('kelas.show', $details->id) }}" class="btn btn-primary mr-2">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      <a href="{{ route('kelas.edit', $details->id) }}" class="btn btn-warning">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                      </a>
                      <form method="POST" action="{{ route('kelas.destroy', $details->id) }}" class="form-inline">
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
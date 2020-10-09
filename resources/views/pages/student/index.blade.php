@extends('layout')

@section('title')
	<title>Byr.SPP - Siswa</title>
@endsection

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Siswa</h1>
    <a href="{{ route('siswa.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Siswa</a>
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
          @if ($students === null || $students === "")
            <h1 class="text-center">EMPTY</h1>
          @else
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($students as $id => $details)
                  <tr>
                    <td>{{ $details->nis }}</td>
                    <td>{{ $details->name }}</td>
                    <td>{{ $details->classroom_id }}</td>
                    @if ($details->gender === 'M')
                      <td>Laki-laki</td>
                    @else
                      <td>Perempuan</td>
                    @endif
                    <td>{{ date_format(date_create($details->birth_date), "d/m/Y") }}</td>
                    <td class="d-flex justify-content-center">
                      <a href="{{ route('siswa.show', $details->id) }}" class="btn btn-primary mr-2">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      <a href="{{ route('siswa.edit', $details->id) }}" class="btn btn-warning">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                      </a>
                      <form method="POST" action="{{ route('siswa.destroy', $details->id) }}" class="form-inline">
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
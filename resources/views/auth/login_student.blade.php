@extends('layouts.app')

@section('title')
	<title>Byr.SPP - Login Siswa</title>
@endsection

@section('content')

  <div class="row justify-content-center h-100">
    <div class="col-xl-10 col-lg-12 col-md-9 my-auto">

      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <span>{{ session('status') }}</span> 
      </div>   
      @endif
      
      <script>
      $(".alert").alert();
      </script>

      <div class="card o-hidden border-0 shadow-lg ">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block align-self-center">
              <img class="img-fluid m-4" src="{{ url('/img/login_siswa.svg') }}" >
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Masuk Sebagai Siswa<h1>
                </div>
                <form method="GET" action="{{ route('student.history') }}" class="user">
                  @csrf

                  <div class="form-group">
                    <label for="nis" class="col-md-12 col-form-label text-md-left">NIS</label>

                    <div class="col-md-12">
                      <input id="nis" type="nis" class="form-control form-control-user @error('nis') is-invalid @enderror" name="nis" required autocomplete="current-password">

                      @error('nis')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12 text-center">
                      <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                          {{ __('Login') }}
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                <hr>
                <div class="text-center">
                  @if (Route::has('register'))
                    <a class="small" href="{{ route('login') }}">Masuk Sebagai Petugas</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel"><b>Gagal Login !</b></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pastikan Username dan Password anda benar</div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

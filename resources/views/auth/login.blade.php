@extends('layouts.app')

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
              <img class="img-fluid" src="{{ url('/img/login.svg') }}" >
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Selamat Datang !</h1>
                </div>
                <form method="POST" action="{{ route('login') }}" class="user">
                  @csrf

                  <div class="form-group">
                      <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail') }}</label>

                      <div class="col-md-12">
                          <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                      <div class="col-md-12">
                          <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-12 ml-auto">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                  {{ __('Ingat Saya') }}
                              </label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-12 text-center">
                        <div class="row justify-content-center">
                          <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Login') }}
                          </button>
                        </div>
                        <div class="row justify-content-center mt-3">
                          @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">
                              {{ __('Lupa Password?') }}
                            </a>
                          @endif
                        </div>
                      </div>
                  </div>
                </form>
                <hr>
                <div class="text-center">
                  @if (Route::has('register'))
                    <a class="small" href="{{ route('register') }}">Daftar</a>
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

<div class="row">
  <div class="col-lg-12">
    <label for="name">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan nama petugas"
      value="{!! !empty($user) ? $user->name : "" !!}">
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-8">
    <label for="email">E-mail</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan e-mail petugas"
    value="{!! !empty($user) ? $user->email : "" !!}">
  </div>
  <div class="col-lg-4">
    <label for="role">Peran</label>
    <select name="role" class="form-control @error('role') is-invalid @enderror">
      @if (!empty($user))
        <option value=0 {{ $user->is_admin ? 'selected' : '' }}>Petugas</option>
        <option value=1 {{ $user->is_admin  ? 'selected' : '' }}>Administrator</option>
      @else
        <option value=0>Petugas</option>
        <option value=1>Administrator</option>
      @endif
    </select>
  </div>
</div>
@if ($type === 'create')
  <div class="row mt-4">
    <div class="col-lg-12">
      <label for="password">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan password untuk data petugas ini">
    </div>
  </div>
@endif


<div class="row mt-4">
  <div class="col-lg-12">
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
  </div>
</div>
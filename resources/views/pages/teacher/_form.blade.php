<div class="row">
  <div class="col-lg-12">
    <label for="name">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan nama guru"
      value="{!! !empty($teacher) ? $teacher->name : "" !!}">
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-4">
    <label for="nip">NIP</label>
    <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" placeholder="Masukan NIP guru"
    value="{!! !empty($teacher) ? $teacher->nip : "" !!}">
  </div>
  <div class="col-lg-4">
    <label for="phone">Nomor HP</label>
    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="ex : 08XXXXXXXXX" pattern="[0-9]{12}"
    value="{!! !empty($teacher) ? $teacher->phone : "" !!}">
  </div>
  <div class="col-lg-2">
    <label for="birthdate">Tanggal Lahir</label>
    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{!! !empty($teacher) ? $teacher->birth_date : "" !!}">
  </div>
  <div class="col-lg-2">
    <label for="gender">Jenis Kelamin</label>
    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
      @if (!empty($teacher))
        <option value="M" {{ ( $teacher->gender == "F") ? 'selected' : '' }}>Laki-laki</option>
        <option value="F" {{ ( $teacher->gender == "F") ? 'selected' : '' }}>Perempuan</option>
      @else
        <option value="M">Laki-laki</option>
        <option value="F">Perempuan</option>
      @endif
    </select>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <label for="address">Alamat</label>
    <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="4">{!! !empty($teacher) ? $teacher->address : "" !!}</textarea>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
  </div>
</div>
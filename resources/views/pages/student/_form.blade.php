<div class="row">
  <div class="col-lg-12">
    <label for="name">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan nama siswa"
      value="{!! !empty($student) ? $student->name : "" !!}">
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-4">
    <label for="nis">NIS</label>
    <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" placeholder="Masukan NIS siswa"
    value="{!! !empty($student) ? $student->nis : "" !!}">
  </div>
  <div class="col-lg-4">
    <label for="birthdate">Tanggal Lahir</label>
    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{!! !empty($student) ? $student->birth_date : "" !!}">
  </div>
  <div class="col-lg-2">
    <label for="gender">Jenis Kelamin</label>
    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
      @if (!empty($student))
        <option value="M" {{ ( $student->gender == "F") ? 'selected' : '' }}>Laki-laki</option>
        <option value="F" {{ ( $student->gender == "F") ? 'selected' : '' }}>Perempuan</option>
      @else
        <option value="M">Laki-laki</option>
        <option value="F">Perempuan</option>
      @endif
    </select>
  </div>
  <div class="col-lg-2">
    <label for="year">Tahun Masuk</label>
    <select name="year" class="form-control @error('year') is-invalid @enderror">
      @if ($academic_year)
        @foreach ($academic_year as $id => $details)
          @if (!empty($student))
            <option value="{{ $details->id }}" {{ ( $student->academic_year_id == $details->id) ? 'selected' : '' }}>{{ $details->year }}</option>
          @else
            <option value="{{ $details->id }}">{{ $details->year }}</option>
          @endif
        @endforeach
      @else
        {{ redirect()->back() }}
      @endif
    </select>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <label for="class">Kelas</label>
    <select name="class" class="form-control @error('class') is-invalid @enderror">
      @if ($classrooms)
        @foreach ($classrooms as $id => $details)
          @if (!empty($student))
            <option value="{{ $details->id }}" {{ ( $student->classroom_id == $details->id) ? 'selected' : '' }}>{{ $details->name }}</option>
          @else
            <option value="{{ $details->id }}">{{ $details->name }}</option>
          @endif
        @endforeach
      @else
        {{ redirect()->back() }}
      @endif
    </select>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <label for="address">Alamat</label>
    <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="4">{!! !empty($student) ? $student->address : "" !!}</textarea>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <label for="name">Nama Kelas</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan nama kelas"
      value="{!! !empty($classroom) ? $classroom->name : "" !!}">
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <label for="teacher">Tahun Masuk</label>
    <select name="teacher" class="form-control @error('year') is-invalid @enderror">
      @if ($teachers)
        @foreach ($teachers as $id => $details)
          @if (!empty($classroom))
            <option value="{{ $details->id }}" {{ ( $classroom->teacher_id == $details->id) ? 'selected' : '' }}>{{ $details->name }}</option>
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
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
    <button type="reset" class="btn btn-danger" ><i class="fa fa-times"></i> Batal</button>
  </div>
</div>
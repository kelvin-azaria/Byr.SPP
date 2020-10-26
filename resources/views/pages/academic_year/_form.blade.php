<div class="row">
  <div class="col-lg-12">
    <label for="year">Tahun</label>
    <input type="number" class="form-control @error('year') is-invalid @enderror" name="year" placeholder="Masukan tahun"
      value="{!! !empty($academic_year) ? $academic_year->year : "" !!}">
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <label for="fee">Jumlah SPP</label>
    <input type="number" class="form-control @error('fee') is-invalid @enderror" name="fee" placeholder="Masukan Jumlah SPP"
    value="{!! !empty($academic_year) ? $academic_year->fee : "" !!}">
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
  </div>
</div>
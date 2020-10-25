@isset($students)
  @php
    $i = 0
  @endphp
  <div class="row">
  @foreach ($students as $id => $details)
    @if ($i === 3)
    </div>
    <div class="row">
    @endif
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-bottom-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-12">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nama Siswa</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $details->name }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
            <div class="row no-gutters align-items-left my-3">
              <ul class="list-group list-group-flush p-0 w-100">
                <li class="list-group-item">NIS : {{ $details->nis }}</li>
                <li class="list-group-item">Kelas : {{ $details->classroom }}</li>
                <li class="list-group-item">Jenis Kelamin : {{ $details->gender === "M" ? "Laki-laki" : "Perempuan" }}</li>
              </ul>
            </div>
            <div class="row no-gutters justify-content-center">
              <a href="{{ route('spp.index', $details->id) }}" class="btn btn-primary stretched-link">
                Lihat Transaksi
              </a>
            </div>
          </div>
        </div>
      </div>
    @php
      $i++
    @endphp
  @endforeach
@endisset
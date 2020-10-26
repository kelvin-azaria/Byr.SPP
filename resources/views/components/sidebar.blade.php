<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-graduation-cap"></i>
    </div>
    <div class="sidebar-brand-text mx-3">
      Byr.SPP
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Data
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-user"></i>
      <span>Siswa</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('siswa.index') }}">Kelas X</a>
        <a class="collapse-item" href="{{ route('siswa.index') }}">Kelas XI</a>
        <a class="collapse-item" href="{{ route('siswa.index') }}">Kelas XII</a>
      </div>
    </div>
  </li>
  
  <li class="nav-item">
    <a href="{{ route('kelas.index') }}" class="nav-link">
      <i class="fas fa-fw fa fa-school" aria-hidden="true"></i>
      <span>Kelas</span>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('guru.index') }}" class="nav-link">
      <i class="fas fa-fw fa fa-chalkboard-teacher" aria-hidden="true"></i>
      <span>Guru</span>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('tahun.index') }}" class="nav-link">
      <i class="fas fa-fw fa fa-chalkboard" aria-hidden="true"></i>
      <span>Tahun Pembelajaran</span>
    </a>
  </li>

  <li class="nav-item">
    <a href="{{ route('spp.search') }}" class="nav-link">
      <i class="fas fa-fw fa fa-hand-holding-usd" aria-hidden="true"></i>
      <span>Transaksi</span>
    </a>
  </li>

  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Laporan
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
      <i class="fas fa-fw fa-file-invoice-dollar"></i>
      <span>Laporan Transaksi</span>
    </a>
    <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('siswa.index') }}">Hari ini</a>
        <a class="collapse-item" href="{{ route('siswa.index') }}">Bulan ini</a>
        <a class="collapse-item" href="{{ route('siswa.index') }}">Tahun ini</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
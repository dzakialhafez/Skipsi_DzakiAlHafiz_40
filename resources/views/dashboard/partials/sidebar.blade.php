<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
    
      <div class="sidebar-brand-text mx-3">SMP MUAD METRO LAMPUNG</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{\Route::current()->getName()=='home' ? 'active' : ''}}">
      <a class="nav-link" href="{{route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dasbor</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if(Auth::user()->lavel == "admin")
    <li class="nav-item {{\Route::current()->getName()=='criteria' ? 'active' : ''}}">
    <a class="nav-link " href="{{route('criteria')}}">
        <i class="fas fa-fw fa-list"></i>
        <span>Master Kriteria</span></a>
    </li>
    @endif
    @if(Auth::user()->lavel == "admin")
    <li class="nav-item {{\Route::current()->getName()=='grupkriteria' ? 'active' : ''}}">
      <a class="nav-link" href="{{route('grupkriteria')}}">
        <i class="fas fa-fw fa-star-half-alt"></i>
        <span>Master Kelas</span></a>
    </li>
    @endif
    <hr class="sidebar-divider my-0">
    @if(Auth::user()->lavel == "admin")
    <li class="nav-item {{\Route::current()->getName()=='employe' ? 'active' : ''}}">
      <a class="nav-link" href="{{route('employe')}}">
        <i class="fas fa-fw fa-users"></i>
        <span>Master Data Siswa</span></a>
    </li>
    @endif
    <li class="nav-item {{\Route::current()->getName()=='assessment' ? 'active' : ''}}">
      <a class="nav-link" href="{{route('assessment')}}">
        <i class="fas fa-fw fa-star-half-alt"></i>
        <span>Penilaian dan Hasil</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw  fa-sign-out-alt"></i>
        <span>Keluar</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block"> 

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
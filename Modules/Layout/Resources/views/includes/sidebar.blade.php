<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  @if (Auth::user()->id == 1)
  <li class="nav-item active">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Charts -->

  @if (Auth::user()->id != 1)
  <li class="nav-item">
    <a class="nav-link" href="{{url('/belibarang')}}">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Beli Barang</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('/cart')}}">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Lihat Keranjang</span></a>
  </li>
  @endif

  @if (Auth::user()->id == 1)
  <li class="nav-item">
    <a class="nav-link" href="{{url('/transaksi')}}">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Transaksi</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{url('/barang')}}">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Barang</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="{{url('/hadiah')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Hadiah</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="{{url('/admin/user')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>User</span></a>
  </li>

  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
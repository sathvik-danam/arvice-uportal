
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('job-asset/img/favicon.png') }}">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Resolve Admin Panel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/adminlte.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app"> 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
      <div class="input-group input-group-sm ml-3">
        <input class="form-control form-control-navbar" type="search" @keyup="searchit" v-model="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/img/logo.png" alt="BuySellHousing Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Resolve</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
          <a class="d-block">{{ Auth::user()->type }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         @if (auth()->check())
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog green"></i>
              <p>
                Manage Users
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="fas fa-users nav-icon blue"></i>
                  <p>Users</p>
                </router-link>
                <router-link to="/partners" class="nav-link">
                <i class="fas fa-suitcase nav-icon blue"></i>
                  <p>Partners</p>
                </router-link>
                <router-link to="/enquiry" class="nav-link">
                <i class="fas fa-location-arrow nav-icon green"></i>
                  <p>Enquiries</p>
                </router-link>
                <router-link to="/city" class="nav-link">
                  <i class="fas fa-city nav-icon yellow"></i>
                  <p>City</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog green"></i>
              <p>
                Manage Profession
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/post" class="nav-link">
                <i class="nav-icon fas fa-plane-departure red"></i>
                  <p>Create Profession</p>
                </router-link>
                <router-link to="/category" class="nav-link">
                <i class="fas fa-star nav-icon yellow"></i>
                  <p>Primary Profession</p>
                </router-link>
                <router-link to="/subcategory" class="nav-link">
                <i class="fas fa-archive nav-icon yellow"></i>
                  <p>Profession Sub-Types</p>
                </router-link>
              </li>
            </ul>
          </li>

          <!-- <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog green"></i>
              <p>
                Manage Invitation
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/post" class="nav-link">
                <i class="nav-icon fas fa-plane-departure red"></i>
                  <p>Total Invitations</p>
                </router-link>
              </li>
            </ul>
          </li> -->
         
          <li class="nav-item">
            <router-link to="/developer" class="nav-link">
              <i class="nav-icon fas fa-cogs pink"></i>
              <p>
                Developer
              </p>
            </router-link>
          </li>
         @endif

          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user orange"></i>
              <p>
                Profile
              </p>
            </router-link>
          </li>
          <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
       <i class="nav-icon fa fa-power-off red"></i>
       <p>
             {{ __('Logout') }}
       </p>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
      </form>            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <router-view></router-view>
      <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Resolve.com
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017-2019 <a href="https://www.northampton.ac.uk/">Resolve</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@auth
<script>
  window.user = @json(auth()->user())
</script>
@endauth

<!-- jQuery -->
<script src="/js/app.js"></script>
<script src="/js/adminlte.js"></script>

</body>
</html>

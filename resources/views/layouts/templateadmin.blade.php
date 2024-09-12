<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin - Luna Amanah</title>
  <link rel="icon" type="image/x-icon" href="{{asset('assets/images/box.ico')}}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('dist/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('dist/assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

  

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('dist/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('dist/assets/css/components.css')}}">
  <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
  
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('dist/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            @auth
            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
            @endauth
            <div class="d-sm-none d-lg-inline-block">Hi,Admin</div></a>
            
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li><li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Menu Content</li>
            <li class="{{ Request::is('admin/category*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.category.index')}}"><i class="fas fa-box"></i> <span>Category</span></a></li>
            <li class="{{ Request::is('admin/subcategory*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.subcategory.index')}}"><i class="fas fa-box"></i> <span>Subcategory</span></a></li>
            <li class="{{ Request::is('admin/banner*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.banner.index')}}"><i class="fas fa-box"></i> <span>Banner</span></a></li>
            <li class="{{ Request::is('admin/testimoni*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.testimoni.index')}}"><i class="fas fa-box"></i> <span>Testimoni</span></a></li>
            <li class="{{ Request::is('admin/certificate-logo*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.certificate-logo.index')}}"><i class="fas fa-box"></i> <span>Logo Sertifikasi</span></a></li>
            <li class="{{ Request::is('admin/berita*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.berita.index')}}"><i class="fas fa-box"></i> <span>Berita</span></a></li>
            <li class="{{ Request::is('admin/tentangkami*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.tentangkami.index')}}"><i class="fas fa-box"></i> <span>Tentang Kami</span></a></li>
            <li class="{{ Request::is('admin/galeri*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.galeri.index')}}"><i class="fas fa-box"></i> <span>Galeri</span></a></li>
            <li class="{{ Request::is('admin/package*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.package.index')}}"><i class="fas fa-box"></i> <span>Paket</span></a></li>
            <li>
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>
          </ul>
        </aside>
      </div>

     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          @yield('header')

          <div class="section-body">
            <div class="card">
              <div class="card-body p-5">@yield('content')</div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer" id="footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/"></a>
        </div>
        <div class="footer-right">
          v2.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('dist/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('dist/assets/modules/popper.js')}}"></script>
  <script src="{{asset('dist/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('dist/assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('dist/assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('dist/assets/modules/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('dist/assets/modules/chart.min.js')}}"></script>
  <script src="{{asset('dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('dist/assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>


  <!-- JS Libraies -->
  <script src="{{asset('dist/assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
  <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
  <!-- Page Specific JS File -->
  <script src="{{asset('dist/assets/js/page/modules-datatables.js')}}"></script>
  

  <!-- Page Specific JS File -->
  <!-- <script src="{{asset('dist/assets/js/page/index.js')}}"></script> -->
  
  <!-- Template JS File -->
  <script src="{{asset('dist/assets/js/scripts.js')}}"></script>
  <script src="{{asset('dist/assets/js/custom.js')}}"></script>

  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace('editor');
    </script>
  <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ session('error') }}",
            });
        @endif
    </script>
</body>
</html>
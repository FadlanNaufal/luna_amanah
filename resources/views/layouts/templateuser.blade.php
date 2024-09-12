<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/styles/main.css')}}">

    <title>Luna Amanah</title>


  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary-new">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="{{asset('assets/images/logo.png')}}" alt="" width="130" class="mr-3">
          </a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link ml-0 ml-md-4 {{ Request::is('/') ? 'active' : '' }}" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ml-0 ml-md-4 {{ Request::is('tentang-kami*') ? 'active' : '' }}" href="{{route('about')}}">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ml-0 ml-md-4 {{ Request::is('paket*') ? 'active' : '' }}" href="{{route('package')}}">Paket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ml-0 ml-md-4 {{ Request::is('berita*') ? 'active' : '' }}" href="{{route('news')}}">Berita</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ml-0 ml-md-4 {{ Request::is('galeri*') ? 'active' : '' }}" href="{{route('gallery')}}">Galeri</a>
              </li>
              <li class="nav-item">
                <a href="{{route('login')}}" class="btn btn-contact-us ml-0 ml-md-4">Hubungi Kami</a>
            </li>
            </ul>
          </div>
        </div>
    </nav>

    @yield('content')


    <footer class="section-footer border-top">
        <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="navbar-brand">
                            <img src="{{asset('assets/images/logo_footer.png')}}" alt="" width="80" class="mr-3 mb-3">
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus nulla distinctio aut facere!</p>
                        </div>

                        <div class="col-12 col-lg-3">
                            <h5> </h5>
                        </div>


                        <div class="col-12 col-lg-3">
                            <h5>Navigasi</h5>
                            <ul class="list-unstyled">
                                <li><a href="">Home</a></li>
                                <li><a href="">Tentang Kami</a></li>
                                <li><a href="">Paket</a></li>
                                <li><a href="">Berita</a></li>
                                <li><a href="">Galeri</a></li>
                            </ul>
                        </div>

                        <div class="col-12 col-lg-3">
                            <h5>Hubungi Kami</h5>
                            <ul class="list-unstyled">
                                <li><a href="">0811 441 109</a></li>
                                <li><a href="">0811 441 008</a></li>
                                <li><a href="">Instagram</a></li>
                                <li><a href="">Tiktok</a></li>
                                <li><a href="">Youtube</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
        
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
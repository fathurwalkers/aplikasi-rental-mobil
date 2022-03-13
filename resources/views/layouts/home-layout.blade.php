<!doctype html>
<html lang="en">

  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('home') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('home') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('home') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('home') }}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('home') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('home') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('home') }}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('home') }}/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('home') }}/css/style.css">

    <style>
        .site-footer {
            padding: 0em 0;
        }
        .hero, .hero > .container > .row {
            height: 70vh!important;
            min-height: 580px;
            margin-bottom: 20px!important;
        }

    </style>
    @stack('css')

  </head>

  <body>


    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <x-home-navbar />


      @yield('header-hero')

      {{-- info section  --}}
      @yield('info')


      {{-- main content  --}}
    <div class="site-section bg-light">
        <div class="container">
            @yield('home-body')
        </div>
    </div>

    {{-- Testimonial  --}}
    @yield('testimonial')

    <div class="site-section bg-primary py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-md-0">
                    <h2 class="mb-0 text-white">Ada kendala atau Pertanyaan seputar Rental kami? </h2>
                    <p class="mb-0 opa-7">Jika ada sebuah kendala ataupun masalah terkait rental kami, silahkan menuju Whatsapp kami untuk keperluan pelaporan. </p>
                </div>
                <div class="col-lg-5 text-md-right">
                    <a href="#" class="btn btn-primary btn-white">Chat sekarang</a>
                </div>
            </div>
        </div>
    </div>


    <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h2 class="footer-heading mb-1 mt-4">Tentang Kami</h2>
              <p> Rendra Rental adalah sebuah Tempat Penyewaan Kendaraan yang beralamatkan di Pos 2, Exa Shop, Jl. Raya Palagimata ruko perempatan rau, Wameo, Kecamatan Batu Poaro, Kota Bau-Bau, Sulawesi Tenggara. </p>
              {{-- <ul class="list-unstyled social">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
              </ul> --}}
            </div>
          </div>
          <div class="row pb-2 mt-1 text-center">
            <div class="col-md-12">
              <div class="border-top pt-1">
                <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a> and Forged by <a href="https://themeslab.org/" target="_blank">Tech.ID</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
              </div>
            </div>

          </div>
        </div>
    </footer>

    </div>

    <script src="{{ asset('home') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('home') }}/js/popper.min.js"></script>
    <script src="{{ asset('home') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('home') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('home') }}/js/jquery.sticky.js"></script>
    <script src="{{ asset('home') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('home') }}/js/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('home') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('home') }}/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('home') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('home') }}/js/aos.js"></script>

    <script src="{{ asset('home') }}/js/main.js"></script>

    @stack('js')

  </body>

</html>

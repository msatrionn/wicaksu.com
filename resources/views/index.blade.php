<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="UTF-8">
  <title>Wicaksu | Air</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ url('images/singo.png') }}" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ url('css/templatemo-chain-app-dev.css') }}">
  <link rel="stylesheet" href="{{ url('css/animated.css') }}">
  <link rel="stylesheet" href="{{ url('css/owl.css') }}">

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="./" class="logo">
              <img src="{{ url('images/xxx.png')}}" alt="Wicaksu">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#about">About</a></li>
              <li class="scroll-to-section"><a href="#pricing">Pricing</a></li>
              <li><a href="https://wa.me/6282271077877">Contact WA</a></li>

              @if (Route::has('login'))
              @auth
              <li>
                <div class="gradient-button"><a href="{{ url('/dashboard') }}"><i class="fa fa-sign-in-alt"></i>Dashboard</a></div>
              </li>
              @else
              <li>
                <div class="gradient-button"><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i>Log in</a></div>
              </li>
              @if (Route::has('register'))
              <li>
                <div class="gradient-button"><a href="{{ route('register') }}"><i class="fa fa-sign-in-alt"></i>Register</a></div>
              </li>
              @endif
              @endauth

              @endif

            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Penyedia Layanan Automisasi Bot E-Commerce, Top-Up Game Online, Pembuatan Web dan Aplikasi </h2>
                    <p>Kami menyediakan Bot auto cekout dengan berbagai fitur, kami juga memiliki program pembantu untuk melakukan automatisasi topup game online yang dapat terhubung dengan berbagai e-comerce maupun web.</p>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{ url('images/slider-dec.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Amazing <em>Services &amp; Features</em> for you</h4>
            <img src="{{ url('images/heading-line-dec.png')}}" alt="">
            <p>Jika anda membutuhkan asisten atau robot otomatis dalam membantu penjualan digital khususnya game online, kami dapat membantu mempercepat dan mempermudah proses transaksi anda.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>App Maintenance</h4>
            <p>Anda akan mendapat dukungan penuh dalam update software dan penambahan denom baru.</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Proses Cepat</h4>
            <p>Anda dapat menambah rating penjualan anda karena proses topup dilakukan dengan sangat cepat.</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>Multi Workflow Idea</h4>
            <p>Anda tetap dapat melakukan proses manual dan multi login.</p><br>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item fourth-service">
            <div class="icon"></div>
            <h4>24/7 Help &amp; Support</h4>
            <p>Kami menyediakan tim suport yang online 24 jam.</p><br>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h4>About <em>What We Do</em> &amp; Who We Are</h4>
            <img src="assets/images/heading-line-dec.png" alt="">
            <p>Mengintergrasikan berbagai ecomerce dan web anda agar dapat melakukan topup secara otomatis.</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Maintance Problems</a></h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">24/7 Support &amp; Help</a></h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Fixing Issues About</a></h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Co. Development</a></h4>
              </div>
            </div>
            <div class="col-lg-12">
              <p>Kami menyediakan contoh trial web topup silahkan kunjungi .</p>
              <div class="gradient-button">
                <a href="ml">Mobile Legends Auto Toup</a>
              </div>

              <div class="gradient-button">
                <a href="higgs">Higgs Domino Auto Toup</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="{{ url('images/about-right-dec.png')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>We Have The Best Pre-Order <em>Prices</em> You Can Get</h4>
            <img src="{{ url('images/heading-line-dec.png')}}" alt="">
            <p>Temukan harga terbaik sesuai dengan kebutuhan anda.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <span class="price">Rp.2jt</span>
            <h4>Pembuatan Bot</h4>
            <div class="icon">
              <img src="{{ url('images/pricing-table-01.png')}}" alt="">
            </div>
            <ul>
              <li>Script Bot</li>
              <li>Instalasi</li>
              <li>Integrasi</li>
              <li class="non-function">Server</li>
              <li class="non-function">Denom</li>
              <li class="non-function">More Options</li>
            </ul>
            <div class="border-button">
              <a href="https://wa.me/6282271077877">Contact Me</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-pro">
            <span class="price">Rp.10jt</span>
            <h4>Pembuatan Web</h4>
            <div class="icon">
              <img src="{{ url('images/pricing-table-01.png')}}" alt="">
            </div>
            <ul>
              <li>Desain</li>
              <li>Bot Automisasi</li>
              <li>Life-time Support</li>
              <li>Integrasi</li>
              <li class="non-function">Domain</li>
              <li class="non-function">Hosting</li>
            </ul>
            <div class="border-button">
              <a href="https://wa.me/6282271077877">Contact Me</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <span class="price">Rp.20Jt</span>
            <h4>Pembuatan Aplikasi</h4>
            <div class="icon">
              <img src="{{ url('images/pricing-table-01.png')}}" alt="">
            </div>
            <ul>
              <li>Desain</li>
              <li>Bot Automisasi</li>
              <li>Life-time Support</li>
              <li>Integrasi</li>
              <li class="non-function">Domain</li>
              <li class="non-function">Server</li>
            </ul>
            <div class="border-button">
              <a href="https://wa.me/6282271077877">Contact Me</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Contact Us</h4>
            <p>Caruban - Madiun, Indonesia</p>
            <p><a href="https://wa.me/6282271077877">082271077877 (WA)</a></p>
            <p><a href="#">wicaksono.bayuaji.wba@gmail.com</a></p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>About Us</h4>
            <ul>
              <li><a href="https://wicaksu.com/game/">Home</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Pricing</a></li>
            </ul>
            <ul>
              <li><a href="#">About</a></li>
              <li><a href="#">Pricing</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Free Apps</a></li>
              <li><a href="#">App Engine</a></li>
              <li><a href="#">Programming</a></li>
              <li><a href="#">Development</a></li>
              <li><a href="#">App News</a></li>
            </ul>
            <ul>
              <li><a href="#">App Dev Team</a></li>
              <li><a href="#">Digital Web</a></li>
              <li><a href="#">Normal Apps</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>About Our Company</h4>
            <div class="logo">
              <img src="{{ url('images/xxx.png' ) }}" alt="">
            </div>
            <p>Menyediakan berbagai layanan digital berupa pembuatan aplikasi, web dan automisasi topup.</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright © 2022 Wicaksu. All Rights Reserved.
              <br>Design: <a href="https://wicaksu.com/" target="_blank" title="css templates">wicaksu.com</a><br>

              Aplikasi : <a href="https://wicaksu.com/game" target="_blank" title="Bootstrap Template World">Game</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('js/owl-carousel.js') }}"></script>
  <script src="{{ url('js/animation.js') }}"></script>
  <script src="{{ url('js/imagesloaded.js') }}"></script>
  <script src="{{ url('js/popup.js') }}"></script>
  <script src="{{ url('js/custom.js') }}"></script>

  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    // var pusher = new Pusher('96835553421a65e69daa', {
    //   cluster: 'ap1'
    // });

    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(data) {
    //   alert(JSON.stringify(data));
    // });
  </script>

  <script>
    window.intergramId = "1480507428"
  </script>
  {{-- <script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>

  <script>
    window.intergramId = "-436498390";
    window.intergramCustomizations = {
      titleClosed: 'Hi!',
      titleOpen: 'Live Chat Wicaksu',
      introMessage: 'Hai ada yang bisa kami bantu ?',
      autoResponse: 'Tunggu sebentar ya ?',
      autoNoResponse: 'Lama nunggu ?, Tenang aja meskipun kamu close web nya, chat kamu kagak bakal ilang kok !',
      mainColor: "#8d9e08", // Can be any css supported color 'red', 'rgb(255,87,34)', etc
      alwaysUseFloatingButton: false // Use the mobile floating button also on large screens
    };
  </script>
  <script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script> --}}
</body>

</html>

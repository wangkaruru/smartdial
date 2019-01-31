
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SmartDial</title>

    <!-- Styles -->
    <link href="{{asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/core.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/thesaas.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png')}}">
    <link rel="icon" href="assets/img/favicon.png">
  </head>

  <body data-aos-easing="ease" data-aos-duration="1500" data-aos-delay="0">


        <!-- Topbar -->
        <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
          <div class="container">
            
            <div class="topbar-left">
              <button class="topbar-toggler">☰</button>
              <a class="topbar-brand" href="#">
                <img class="logo-default" src="assets/img/logo.png" alt="logo">
                <img class="logo-inverse" src="assets/img/logo-light.png" alt="logo">
              </a>
            </div>
    
    
            <div class="topbar-right">
              <ul class="topbar-nav nav">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Samples <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="#">Helpato</a>
                    <a class="nav-link" href="#">Trello</a>
                    
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Campaigns <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="#">Solid Color</a>
                    <a class="nav-link" href="#">Gradient</a>
                 
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Leads <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu cols-2">
                    <a class="nav-link" href="#">Feature</a>
                    <a class="nav-link" href="#">Textual feature</a>
                    
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Phones <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="#">Blog grid</a>
                    <a class="nav-link" href="#">Blog list</a>
                    
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Scripts <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="#">Product list</a>
                    <a class="nav-link" href="#">Single product</a>
                   
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Agents <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="#">How it works</a>
                    <a class="nav-link" href="#">Pricing</a>
                 
                  </div>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>                  
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>               
               
                       
              </ul>
            </div>
    
          </div>
        </nav>
        <!-- END Topbar -->
    
    
    
    
        <!-- Header -->
        <header class="header fadeout header-inverse pb-0 h-fullscreen" style="background-image: linear-gradient(to bottom, #243949 0%, #517fa4 100%);">
          <canvas class="constellation" width="1366" height="657"></canvas>
    
          <div class="container">
            <div class="row h-full">
              <div class="col-12 text-center align-self-center">
                <h1 class="fs-50 fw-600 lh-15 hidden-sm-down">Built for <span class="text-primary" data-type="Call Centres, Startups, Debt Mngmt, Marketing"> Finace Mngt</span><span class="typed-cursor">|</span></h1>
                <h1 class="fs-35 fw-600 lh-15 hidden-md-up">Built for<br><span class="text-primary" data-type="Authors, Startups, Entrepreneurs, WebApps"> Call Center Mngt</span><span class="typed-cursor">|</span></h1>
                <br>
                <p class="fs-20 hidden-sm-down"><strong>SmartDial</strong> is an elegant, modern and fully interactive Debt Management system</p>
                <p class="fs-16 hidden-md-up"><strong>SmartDial</strong> is an elegant, modern and fully fully interactive Debt Management system</p>
                <br>
                <hr class="w-60 hidden-sm-down">
                <br>
                <a class="btn btn-xl btn-round btn-primary fs-20 fw-500 w-350 shadow-3 hidden-sm-down" href="#">Talk 2Us Now</a>
                <a class="btn btn-lg btn-round btn-primary w-250 shadow-3 hidden-md-up" href="#">Purchase Now</a>
                <br>
                
              </div>
    
              <div class="col-12 align-self-end text-center pb-70">
                <a class="scroll-down-2 scroll-down-inverse" href="#" data-scrollto="section-demo"><span></span></a>
              </div>
            </div>
          </div>
        </header>
        <!-- END Header -->
    
    
    
    
        <!-- Main container -->
        <main class="main-content">


    
    
        </main>
        <!-- END Main container -->


    <!-- Scripts -->
   
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/thesaas.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

  </body>

</html>

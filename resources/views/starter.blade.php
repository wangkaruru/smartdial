
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TheSaaS - Header slider</title>

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
              <a class="topbar-brand" href="index.html">
                <img class="logo-default" src="assets/img/logo.png" alt="logo">
                <img class="logo-inverse" src="assets/img/logo-light.png" alt="logo">
              </a>
            </div>
    
    
            <div class="topbar-right">
              <ul class="topbar-nav nav">
                <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Samples <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="demo-helpato.html">Helpato</a>
                    <a class="nav-link" href="demo-trello.html">Trello</a>
                    
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Headers <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="header-color.html">Solid Color</a>
                    <a class="nav-link" href="header-gradient.html">Gradient</a>
                 
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Blocks <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu cols-2">
                    <a class="nav-link" href="block-feature.html">Feature</a>
                    <a class="nav-link" href="block-feature-textual.html">Textual feature</a>
                    
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Blog <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="blog-grid.html">Blog grid</a>
                    <a class="nav-link" href="blog-list.html">Blog list</a>
                    
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Shop <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="shop-list.html">Product list</a>
                    <a class="nav-link" href="shop-single.html">Single product</a>
                   
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href="#">Pages <i class="fa fa-caret-down"></i></a>
                  <div class="nav-submenu">
                    <a class="nav-link" href="page-how-it-works.html">How it works</a>
                    <a class="nav-link" href="page-pricing.html">Pricing</a>
                 
                  </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>                  
                </li>
    
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
               
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
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
                <h1 class="fs-50 fw-600 lh-15 hidden-sm-down">Built for <span class="text-primary" data-type="Authors, Startups, Entrepreneurs, SaaS, WebApps"> WebApps</span><span class="typed-cursor">|</span></h1>
                <h1 class="fs-35 fw-600 lh-15 hidden-md-up">Built for<br><span class="text-primary" data-type="Authors, Startups, Entrepreneurs, SaaS, WebApps"> Web</span><span class="typed-cursor">|</span></h1>
                <br>
                <p class="fs-20 hidden-sm-down"><strong>TheSaaS</strong> is an elegant, modern and fully customizable SaaS and WebApp template</p>
                <p class="fs-16 hidden-md-up"><strong>TheSaaS</strong> is an elegant, modern and fully customizable SaaS and WebApp template</p>
                <br>
                <hr class="w-60 hidden-sm-down">
                <br>
                <a class="btn btn-xl btn-round btn-primary fs-20 fw-500 w-350 shadow-3 hidden-sm-down" href="https://themeforest.net/item/thesaas-responsive-bootstrap-saas-software-webapp-template/19778599?license=regular&amp;open_purchase_for_item_id=19778599&amp;purchasable=source&amp;ref=thethemeio">Purchase Now - $19</a>
                <a class="btn btn-lg btn-round btn-primary w-250 shadow-3 hidden-md-up" href="https://themeforest.net/item/thesaas-responsive-bootstrap-saas-software-webapp-template/19778599?license=regular&amp;open_purchase_for_item_id=19778599&amp;purchasable=source&amp;ref=thethemeio">Purchase Now - $19</a>
                <br>
                <p class="mt-2 mt-md-4"><a href="https://themeforest.net/item/thesaas-responsive-bootstrap-saas-software-webapp-template/19778599?license=extended&amp;open_purchase_for_item_id=19778599&amp;purchasable=source&amp;ref=thethemeio"><small>or purchase an Extended License</small></a></p>
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
    
    
    
    
    
    
        <!-- Footer -->
        <footer class="site-footer">
          <div class="container">
            <div class="row gap-y align-items-center">
              <div class="col-12 col-lg-3">
                <p class="text-center text-lg-left">
                  <a href="index.html"><img src="assets/img/logo.png" alt="logo"></a>
                </p>
              </div>
    
              <div class="col-12 col-lg-6">
                <ul class="nav nav-primary nav-hero">
                  <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="blog.html">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="block-feature.html">Features</a>
                  </li>
                  <li class="nav-item hidden-sm-down">
                    <a class="nav-link" href="page-pricing.html">Pricing</a>
                  </li>
                  <li class="nav-item hidden-sm-down">
                    <a class="nav-link" href="page-contact.html">Contact</a>
                  </li>
                </ul>
              </div>
    
             
            </div>
          </div>
        </footer>
        <!-- END Footer -->
    


    <!-- Scripts -->
   
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/thesaas.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

  </body>

</html>

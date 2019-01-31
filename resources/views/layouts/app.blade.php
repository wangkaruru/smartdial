
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
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>                  
                </li>
    
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @else
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
                        @endguest
              </ul>
            </div>
    
          </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

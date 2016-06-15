<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>wsa</title>
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black" />
      <link rel="shortcut icon" href="{{ URL::asset('framework/flat-ui/images/favicon.ico')}}">
      <link rel="stylesheet" href="{{ URL::asset('framework/flat-ui/bootstrap/css/bootstrap.css')}}">
      <link rel="stylesheet" href="{{ URL::asset('framework/common-files/css/icon-font.css') }}">
      <!-- end -->
      <link rel="stylesheet" href="{{ URL::asset('framework/samples/sample-04/css/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('framework/css/custom.css') }}">
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="{{  URL::asset('framework/common-files/js/jquery-1.10.2.min.js')}}"></script>
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script>
        $(function() {
          var availableTags = [
            "Hair Cut",
            "Barber",
            "Weaves & Extensions",
            "Nails",
            "Makeup",
            "Color",
            "Sew-ins",
            "Shampoo & Style",
            "Lashes",
            "Makeup",
            "Blow Outs",
            "Groovy",
            "Waxes",
            "Brow",
            "Highlights"

          ];
          $( "#tags" ).autocomplete({
            source: availableTags
          });
        });
        </script>
   </head>
   <body>
      <div class="page-wrapper">
         <!-- header-10 -->
         <header class="header-10">
            <div class="container">
               <div class="navbar col-sm-12" role="navigation">
                  <div class="navbar-header">
                     <a class="brand" href="#"><img src="{{ URL::asset('framework/img/wsa-logo-beta.png')}}" width="160"></a>
                  </div>
                  <div class="collapse navbar-collapse pull-right">
                     <ul class="nav pull-left">
                        <li><a href="#">Discover</a></li>
                        <li><a href="#">Cart</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if(Auth::user()->role === 2)
                                      <li><a href="/admin">Dashboard</a></li>
                                    @endif
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                        <form class="navbar-form pull-left">
                           <a class="btn btn-info onboard-cta" href="#">Be a Stylist</a>
                           </form>
                     </ul>
                     <!--<form class="navbar-form pull-left">
                        <a class="btn btn-info" href="#">Buy Now</a>
                        </form>-->
                  </div>
               </div>
            </div>
         </header>
         @yield('content')
         <!-- footer-3 -->
        @include('layouts.footer')
      </div>
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="{{ URL::asset('framework/common-files/js/jquery-1.10.2.min.js') }}"></script>
      <script src="{{ URL::asset('framework/flat-ui/js/bootstrap.min.js') }}"></script>
      <script src="{{ URL::asset('framework/samples/sample-04/js/script.js') }}"></script>
   </body>
</html>

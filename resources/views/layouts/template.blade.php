<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

     <!-- Scripts -->

  </head>
  <body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary "style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        @auth
        @if(Auth::user()->isAdmin())
            <li class="nav-item">
            <a class="nav-link {{ $ActiveAbout ?? ''}}" href="/index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{$ActiveAFL1 ?? ''}}" href="/view_status">Status Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{$ActiveAFL1 ?? ''}}" href="/view_banner">Make banner</a>
          </li>
        @endif
        @if(Auth::user()->isAdmin()||Auth::user()->isStaff())
        @endif

        <li class="nav-item">
            <a class="nav-link {{$ActiveProjek ?? ''}}" href="/view_menu">Menu</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{$ActiveAFL1 ?? ''}}" href="/view_order">Cart</a>
          </li>
        @endauth
      </ul>
       <!-- Right Side Of Navbar -->
       <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    </div>
  </div>
</nav>
  <div class="container mt-5">


    <h2>@yield('layout_tagline')</h2>
    @yield('layout_content')
</div>
  </body>
</html>


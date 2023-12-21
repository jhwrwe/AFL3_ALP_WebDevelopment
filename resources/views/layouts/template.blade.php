<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        .bg-c1 {
            background-color: #42332E;
        }

        .bg-CFAC89 {
            background-color: #CFAC89;
        }

        .bg-c3 {
            background-color:
        }

                .bg-mojito {
                    background-color: #fbfff4;
                }

        .border-c1 {
            background-color: #42332E;
        }

        .text-c1 {
            color: #CFAC89;
        }

        nav.transparent {
            background-color: #fbfff4 !important;
            color: black !important;
        }

        nav.transparent a {
            color: black !important;
        }

        nav.scrolled {
            background-color: #CFAC89 !important;
        }
    </style>
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
              <a class="nav-link {{ $ActiveAbout ?? ''}}" href="/tentangkita">About us</a>
            </li>
          @endif
          @if(Auth::user()->isAdmin()||Auth::user()->isTeacher())
          <li class="nav-item">
              <a class="nav-link {{ $ActiveContact ?? ''}}" href="/kontakkita">Contact us</a>
            </li>
          @endif
          <li class="nav-item">
              <a class="nav-link {{$ActiveProjek ?? ''}}" href="/projekkita">All our project</a>
            </li>
          @endauth
          <li class="nav-item">
            <a class="nav-link {{$ActiveMain ?? ''}}" aria-current="page" href="/">Welcome</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{$ActiveAFL1 ?? ''}}" href="/AFL1">AFL 1 proj</a>
          </li>
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


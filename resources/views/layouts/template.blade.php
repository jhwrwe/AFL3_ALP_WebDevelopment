<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const body = document.body;
            const navbar = document.querySelector('.navbar');

            // Add class to body on page load
            body.classList.add('pre-scroll');
            window.addEventListener("scroll", function() {
                // Check if the user has started scrolling
                if (window.scrollY > 0) {
                    // Remove the class from body and update navbar
                    body.classList.add('pre-scroll');
                    navbar.classList.add('bg-scrolled', 'fixed-top');
                } else {
                    // Add the class to body and update navbar
                    body.classList.add('pre-scroll');
                    navbar.classList.remove('bg-scrolled', 'fixed-top');
                    navbar.classList.add('bg-unscrolled')
                }
            });
        });
    </script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>
        footer p,
        footer h6 {
            color: #CFAC89;
        }

        .pre-scroll {
            background-color: #fff5ea;
        }

        .pre-scroll .navbar-brand {
            color: #42332E;
            /* Set text color to white before scrolling */
            transition: color 1s ease-out;
            /* Smooth transition */
        }

        .bg-unscrolled {
            background-color: #fff5ea !important;
            transition: background-color 1s ease-out;
        }

        .bg-scrolled {
            background-color: #CFAC89 !important;
            transition: background-color 1s ease-out;
        }

        .bg-2 {
            background-color: #42332E;
        }

        /* Additional styles for smooth transition */
        .navbar {
            transition: padding 0.3s ease, background-color 0.3s ease;
        }

        .navbar-brand {
            transition: color 0.3s ease;
        }

        .navbar-toggler {
            transition: background-color 0.3s ease;
        }

        .navbar-nav .nav-link {
            transition: color 0.3s ease;
        }

        .navbar-toggler-icon {
            transition: background-color 0.3s ease;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <img src="/image/Classic.png" alt="Classic Logo" class="img-fluid mr-2" width="40" height="50">
            <a class="navbar-brand" href="#">Classic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ $ActiveAbout ?? '' }}" href="/index">Home</a>
                    </li>
                    @auth
                        @if (Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link {{ $ActiveAFL1 ?? '' }}" href="/view_status">Status Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $ActiveAFL1 ?? '' }}" href="/view_banner">Banner</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $ActiveAFL1 ?? '' }}" href="/view_category">Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $ActiveAFL1 ?? '' }}" href="/view_category_menu">Kategori Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $ActiveAFL1 ?? '' }}" href="/view_menu">Menu</a>
                            </li>
                        @endif
                        @if (Auth::user()->isAdmin() || Auth::user()->isStaff())
                        @endif
                        @if (Auth::user()->isUser())
                            <li class="nav-item">
                                <a class="nav-link {{ $ActiveAFL1 ?? '' }}" href="/view_true_menu">Menu</a>
                            </li>

                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ $ActiveAFL1 ?? '' }}" href="/view_order">Keranjang</a>
                        </li>
                    @endauth




                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

    <footer>
        <!-- Footer -->
        <footer class="bg-2 text-center text-lg-start text-muted">

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            </section>
            <section class="">
                <div class="container-fluid text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>Classic Cake and Bread
                            </h6>
                            <p>
                                Here you can use rows and columns to organize your footer content. Lorem ipsum
                                dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Produk
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Roti</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Kue</a>
                            </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Kontak</h6>
                            <p><i class="fas fa-home me-3"></i> Lombok, Indonesia</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                info@gmail.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> + 62 811 234 567</p>
                        </div>
                    </div>
                </div>
            </section>
        </footer>

        <script>
            document.addEventListener("DOMContentLoaded", function(event) {

                const showNavbar = (toggleId, navId, bodyId, headerId) => {
                    const toggle = document.getElementById(toggleId),
                        nav = document.getElementById(navId),
                        bodypd = document.getElementById(bodyId),
                        headerpd = document.getElementById(headerId)

                    // Validate that all variables exist
                    if (toggle && nav && bodypd && headerpd) {
                        toggle.addEventListener('click', () => {
                            // show navbar
                            nav.classList.toggle('show')
                            // change icon
                            toggle.classList.toggle('bx-x')
                            // add padding to body
                            bodypd.classList.toggle('body-pd')
                            // add padding to header
                            headerpd.classList.toggle('body-pd')
                        })
                    }
                }

                showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

                /*===== LINK ACTIVE =====*/
                const linkColor = document.querySelectorAll('.nav_link')

                function colorLink() {
                    if (linkColor) {
                        linkColor.forEach(l => l.classList.remove('active'))
                        this.classList.add('active')
                    }
                }
                linkColor.forEach(l => l.addEventListener('click', colorLink))

                // Your code to run since DOM is loaded and ready
            });
        </script>

</body>

</html>

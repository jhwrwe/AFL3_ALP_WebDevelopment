@extends('layouts.template')

@section('layout_content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Our Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyZ9aC85rXWOlG9DlHbYbYUKw2v9G0F5KX" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        /* Navbar styles */
        nav {
            background-color: #343a40;
        }

        nav a {
            color: #fff;
        }

        /* Carousel styles */
        #bannerCarousel {
            max-height: 500px;
            overflow: hidden;
            position: relative;
        }

        .carousel-inner img {
            width: 100%;
            height: 500px; /* Adjust as needed */
            object-fit: cover;
        }

        .carousel-control-prev,
        .carousel-control-next {
            color: #fff;
        }

        /* Shared section styles */
        .shared-section {
            display: flex;
            align-items: center;
            padding: 60px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            transition: transform 0.3s ease-in-out;
        }

        .shared-section:hover {
            transform: scale(1.05);
        }

        .section-text {
            width: 60%;
            font-size: 1.5rem;
            line-height: 1.6;
        }

        .section-description {
            font-size: 1rem;
            margin-top: 20px;
        }

        .section-image {
            width: 40%;
            padding-left: 20px;
        }

        .section-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px; /* Add a border radius for a rounded look */
        }

        /* Keunggulan section styles */
        .keunggulan-section {
            flex-direction: row-reverse; /* Reverse the order of flex items */
        }

        /* Visi dan Misi section styles */
        .visi-misi-section {
            background: linear-gradient(90deg, #cfac89, #c68c5f, #c47647, #98644F, #42332e);
            color: #fff;
            padding: 80px 0;
            position: relative;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px; /* Adjusted margin-top to make it closer */
        }

        .visi-misi-section h2 {
            color: #fff;
            margin-bottom: 30px;
        }

        .visi-misi-section:before,
        .visi-misi-section:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 100%;
            background-color: #cfac89; /* Adjusted color to match the gradient */
            z-index: -1;
            border-radius: 8px;
        }

        .visi-misi-section:before {
            left: 0;
        }

        .visi-misi-section:after {
            right: 0;
        }

        .visi-misi-border {
            border: 2px solid #fff;
            padding: 20px;
            position: relative;
            background-color: transparent;
            border-radius: 8px;
            background-image: linear-gradient(to right, #cfac89, #c68c5f, #c47647, #98644F, #42332e);
        }

        .visi-misi-border h3 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Menu title styles */
        .menu-title-container {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu-title {
            position: relative;
            display: inline-block;
        }

        .menu-title:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #cfac89, #98644f, #42332e);
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mb-3 menu-title-container">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 menu-title">
                WELCOME
            </h1>
        </div>

    <!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Bakery Name</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

    <!-- Banner Carousel -->
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($banner as $singleBanner)
            <div class="carousel-item {{ $loop->index === 0 ? 'active' : '' }}">
                @if ($singleBanner->photo)
                <img src="{{ asset('storage/' . $singleBanner->photo) }}" alt="{{ $singleBanner->name }}"
                    class="d-block w-100 img-fluid">
                <div class="overlay"></div>
                @else
                <img src="{{ asset('images/notavailable.jpg') }}" alt="No Image" class="d-block w-100 img-fluid">
                @endif
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Classic Section -->
    <section class="shared-section classic-section">
        <div class="section-text">
            <h3 class="text-3xl font-bold mb-3">
                Classic
            </h3>
            <p class="section-description">
                Classic adalah tempat yang tepat untuk memenuhi kebutuhan roti dan kue Anda. Kami memiliki roti tawar,
                roti manis, roti gandum, kue tart, kue lapis, kue bolu, dan masih banyak lagi. Semua dibuat dengan
                bahan-bahan pilihan dan resep tradisional. Datang dan rasakan sendiri kelezatannya!
            </p>
        </div>
        <div class="section-image">
            <img src="/image/Classic.png" alt="Classic">
        </div>
    </section>

    <!-- Keunggulan Section -->
    <section class="shared-section keunggulan-section">
        <div class="section-text">
            <h3 class="text-3xl font-bold mb-3">
                Keunggulan
            </h3>
            <p class="section-description">
                1. Tanpa Pengawet: Kami hanya menggunakan bahan-bahan alami dan segar yang diolah dengan higienis. Hal
                ini untuk menjamin kualitas dan kesegaran produk kami.
            </p>
            <p class="section-description">
                2. Harga terjangkau: Kami menawarkan harga yang terjangkau dan bersaing. Kami juga memberikan diskon dan
                promo menarik.
            </p>
            <p class="section-description">
                3. Bervariasi: Kami memiliki berbagai macam varian produk yang dapat memenuhi selera dan kebutuhan
                pelanggan. Kami dapat menyesuaikan rasa, bentuk, ukuran, dan topping sesuai dengan keinginan pelanggan.
            </p>
            <p class="section-description">
                4. Pesanan Khusus: Kami melayani pesanan khusus untuk acara-acara tertentu, seperti ulang tahun,
                pernikahan, atau pesta. Kami dapat membuat roti dan kue dengan tema dan desain yang unik dan menarik.
            </p>
        </div>
        <div class="section-image">
            <img src="/image/Keunggulan.png" alt="Keunggulan">
        </div>
    </section>

    <!-- Visi dan Misi Section -->


            <h2 class="text-center mb-4">Visi dan Misi</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="visi-misi-border">
                        <h3 class="text-3xl font-bold mb-3">Visi</h3>
                        <ul class="w-full text-center text-sm">
                            <li class="border-b py-4 pr-4">Menjadi platform online terdepan yang menghubungkan guru dan sekolah
                                di Indonesia.</li>
                            <li class="border-b py-4">Menjadi solusi inovatif yang memecahkan masalah kekurangan dan
                                ketimpangan guru di Indonesia.</li>
                            <li class="border-b py-4">Menjadi mitra strategis bagi pemerintah dalam mengembangkan sumber
                                daya manusia yang unggul melalui pendidikan.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">
                    <div class="visi-misi-border">
                        <h3 class="text-3xl font-bold mb-3">Misi</h3>
                        <ul class="w-full text-center text-sm">
                            <li class="border-b py-4">Menyediakan basis data yang lengkap, akurat, dan terpercaya tentang
                                guru yang boleh mengajar di Indonesia.</li>
                            <li class="border-b py-4">Menyediakan layanan yang mudah, cepat, dan aman bagi sekolah untuk
                                mencari dan merekrut guru yang sesuai dengan kriteria mereka.</li>
                            <li class="border-b py-4">Menyediakan insentif dan penghargaan bagi guru yang berprestasi dan
                                berdedikasi tinggi.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>

@endsection

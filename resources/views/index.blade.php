@extends('layouts.template')
@section('layout_content')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Roti Kami - Selamat Datang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyZ9aC85rXWOlG9DlHbYbYUKw2v9G0F5KX" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        nav {
            background-color: #1a1a1a;
            padding: 15px 0;
        }

        nav a {
            color: #fff;
        }

        #bannerCarousel {
            max-height: 500px;
            overflow: hidden;
            position: relative;
        }

        .carousel-inner img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .carousel-control-prev,
        .carousel-control-next {
            color: #fff;
        }

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
            max-width: 80%;
            height: auto;
            border-radius: 8px;
        }

        .keunggulan-section {
            flex-direction: row-reverse;
        }

        .visi-misi-section {
            background-color: #fff;
            color: #333;
            padding: 80px 0;
            position: relative;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .visi-misi-section h2 {
            color: #333;
            margin-bottom: 30px;
        }

        .visi-misi-border {
            border: 2px solid #333;
            padding: 20px;
            position: relative;
            border-radius: 8px;
        }

        .visi-misi-border h3 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .visi-misi-border ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .visi-misi-border li {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

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

        .footer {
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
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
    <div class="mb-3">
        <div class="mb-3 menu-title-container">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 menu-title">
                Classic
            </h1>
        </div>
    </div>

    <!-- Classic Section -->
    <section class="shared-section classic-section">
        <div class="section-text">
            <h3 class="text-3xl font-bold mb-3">Classic</h3>
            <p class="section-description">
                Temukan berbagai pilihan roti dan kue klasik terbaik hanya di Toko Roti Kami. Mulai dari roti tawar,
                roti manis, roti gandum, hingga kue tart dan kue lapis, semuanya dibuat dengan bahan-bahan berkualitas
                tinggi dan resep tradisional yang lezat.
            </p>
        </div>
        <div class="section-image">
            <img src="/image/Classic.png" alt="Klasik">
        </div>
    </section>

    <!-- Keunggulan Section -->
    <section class="shared-section keunggulan-section">
        <div class="section-text">
            <h3 class="text-3xl font-bold mb-3">Keunggulan Kami</h3>
            <p class="section-description">
                Kami bangga menyajikan produk tanpa pengawet, dengan bahan-bahan alami dan segar yang diolah dengan
                higienis untuk menjamin kualitas dan kesegaran. Harga terjangkau, promo menarik, dan berbagai varian
                produk siap memenuhi selera Anda. Pesan khusus untuk acara spesial? Kami siap memberikan sentuhan unik
                dan lezat pada roti dan kue sesuai tema yang Anda inginkan.
            </p>
        </div>
        <div class="section-image pl-2">
            <img src="/image/Keunggulan.png" alt="Keunggulan">
        </div>
    </section>

    <!-- Visi dan Misi Section -->
    <h2 class="text-center mb-4 p-4">Visi dan Misi</h2>
    <div class="container p-4 text-center d-flex justify-content-center">

        <div class="row">
            <div class="col-lg-5">
                <div class="visi-misi-border">
                    <h3 class="text-3xl font-bold mb-3">Visi</h3>
                    <ul>
                        <li>Menghadirkan roti dan kue berkualitas tinggi untuk kebahagiaan pelanggan.</li>
                        <li>Menjadi toko roti terkemuka di Indonesia dengan pelayanan terbaik.</li>
                        <li>Memberikan pengalaman kuliner yang tak terlupakan melalui produk kami.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
            </div>
            <div class="col-lg-5">
                <div class="visi-misi-border">
                    <h3 class="text-3xl font-bold mb-3">Misi</h3>
                    <ul>
                        <li>Menyajikan roti dan kue dengan bahan berkualitas dan proses produksi yang higienis.</li>
                        <li>Memberikan pilihan menu yang beragam dan sesuai dengan selera pelanggan.</li>
                        <li>Menjaga kepuasan pelanggan melalui inovasi produk dan pelayanan yang ramah.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-e7JN5SnpA9R3sT50ZAzrMP7qF+3ppTIq6jQmUULlR/jLwiXQjBAF2Xp1CViStvSP"
        crossorigin="anonymous"></script>
</body>

</html>
@endsection

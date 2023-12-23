@extends('layouts.template')

@section('layout_content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homepage</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyZ9aC85rXWOlG9DlHbYbYUKw2v9G0F5KX" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-qCS0GOEOqibZ2koTszv8AIQb5pV51USMlYdpHrPyFYPAeX2P3p3HY3I6YJIS4rYs" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to Our Bakery</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyZ9aC85rXWOlG9DlHbYbYUKw2v9G0F5KX" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
        <style>
        <style>
            .classic-section {
            display: flex;
            align-items: center;
            background: linear-gradient(to right, #cfac89, #98644f, #42332e);
            color: #fff;
            padding: 60px;
        }

        .classic-text {
            width: 40%;
            font-size: 2rem;
            line-height: 1.4;
        }

        .classic-description {
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .classic-image {
            width: 60%;
            padding-left: 20px;
        }

        .classic-image img {
            max-width: 100%;
            height: auto;
        }

        /* Adjusted styling for Keunggulan section */
        .keunggulan-section {
            display: flex;
            align-items: center;
            padding: 60px;
        }

        .keunggulan-text {
            width: 40%;
            font-size: 2rem;
            line-height: 1.4;
        }

        .keunggulan-description {
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .keunggulan-image {
            width: 60%;
            padding-left: 20px;
        }

        .keunggulan-image img {
            max-width: 100%;
            height: auto;
        }

        /* Additional styling for Visi dan Misi section */
        .visi-misi-section {
            background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
            color: #fff;
            padding: 80px 0;
            position: relative;
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
            background-color: #d53369;
            z-index: -1;
        }

        .visi-misi-section:before {
            left: 0;
        }

        .visi-misi-section:after {
            right: 0;
        }

        .carousel-inner img {
            width: 100%;
            height: 500px; /* Adjust as needed */
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel"
        style="max-height: 500px; overflow: hidden; position: relative;">
        @if ($banner->count() > 0)
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
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        @else
        <p>No banners available</p>
        @endif
    </div>

    <section class="classic-section">
        <div class="classic-text">
            <h3 class="text-3xl font-bold mb-3">
                Classic
            </h3>
            <p class="classic-description">
                Classic adalah tempat yang tepat untuk memenuhi kebutuhan roti dan kue Anda. Kami memiliki roti tawar,
                roti manis, roti gandum, kue tart, kue lapis, kue bolu, dan masih banyak lagi. Semua dibuat dengan
                bahan-bahan pilihan dan resep tradisional. Datang dan rasakan sendiri kelezatannya!
            </p>
        </div>
        <div class="classic-image">
            <img src="/image/Keunggulan.png" alt="GUmum">
        </div>
    </section>

    <section class="keunggulan-section">
        <div class="keunggulan-text">
            <h3 class="text-3xl font-bold mb-3">
                Keunggulan
            </h3>
            <p class="keunggulan-description">
                1. Tanpa Pengawet: Kami hanya menggunakan bahan-bahan alami dan segar yang diolah dengan higienis. Hal
                ini untuk menjamin kualitas dan kesegaran produk kami.
            </p>
            <p class="keunggulan-description">
                2. Harga terjangkau: Kami menawarkan harga yang terjangkau dan bersaing. Kami juga memberikan diskon dan
                promo menarik.
            </p>
            <p class="keunggulan-description">
                3. Bervariasi: Kami memiliki berbagai macam varian produk yang dapat memenuhi selera dan kebutuhan
                pelanggan. Kami dapat menyesuaikan rasa, bentuk, ukuran, dan topping sesuai dengan keinginan pelanggan.
            </p>
            <p class="keunggulan-description">
                4. Pesanan Khusus: Kami melayani pesanan khusus untuk acara-acara tertentu, seperti ulang tahun,
                pernikahan, atau pesta. Kami dapat membuat roti dan kue dengan tema dan desain yang unik dan menarik.
            </p>
        </div>
        <div class="keunggulan-image">
            <img src="/image/Keunggulan.png" alt="GUmum">
        </div>
    </section>

    <section class="visi-misi-section">
        <div class="container">
            <h2 class="text-center mb-4">Visi dan Misi</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div
                        class="bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow p-8 text-3xl font-bold text-center border-b-4">
                        Visi
                    </div>
                    <ul class="w-full text-center text-sm">
                        <li class="border-b py-4">Menjadi platform online terdepan yang menghubungkan guru dan sekolah di
                            Indonesia.</li>
                        <li class="border-b py-4">Menjadi solusi inovatif yang memecahkan masalah kekurangan dan ketimpangan
                            guru di Indonesia.</li>
                        <li class="border-b py-4">Menjadi mitra strategis bagi pemerintah dalam mengembangkan sumber daya
                            manusia yang unggul melalui pendidikan.</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="bg-white rounded-t-none rounded-b-none overflow-hidden shadow p-6">
                        <!-- Additional content for the middle section if needed -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div
                        class="bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow p-8 text-3xl font-bold text-center border-b-4">
                        Misi
                    </div>
                    <ul class="w-full text-center text-sm">
                        <li class="border-b py-4">Menyediakan basis data yang lengkap, akurat, dan terpercaya tentang
                            guru yang boleh mengajar di Indonesia.</li>
                        <li class="border-b py-4">Menyediakan layanan yang mudah, cepat, dan aman bagi sekolah untuk mencari
                            dan merekrut guru yang sesuai dengan kriteria mereka.</li>
                        <li class="border-b py-4">Menyediakan insentif dan penghargaan bagi guru yang berprestasi dan
                            berdedikasi tinggi.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

@endsection

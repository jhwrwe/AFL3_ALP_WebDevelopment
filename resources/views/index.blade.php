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

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
        <style>
            .custom-image-size {
                max-width: var(--image-width, 300px);
                width: 100%;
                height: auto;
                margin-left: 100%;
                position: absolute;
                right: 25%;
                bottom: -33%
            }

            .custom-text-container {
                width: 55%;
            }

            .custom-text-container2 {
                width: 100%;
                text-justify: right;
            }

            .product-grid .title a:hover {
                animation: color-animate 5s infinite linear;
            }

            .colorchange {
                font-size: 40px;
                font-weight: 300px;
                animation: color-animate 4s infinite linear;
            }

            @keyframes color-animate {
                0% {
                    color: #c68c5f;
                }

                20% {
                    color: #c47647;
                }

                40% {
                    color: #c47647;
                }

                60% {
                    color: #42332e;
                }

                80% {
                    color: #000000;
                }

                100% {
                    color: #c68c5f;
                }
            }

            .menu-title-container {
                margin-top: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .menu-title {
                position: relative;
                font-size: 2rem;
                /* Adjust the font size as needed */
            }

            .menu-title::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: -7px;
                /* Adjust the distance between the text and the underline */
                width: 100%;
                height: 5px;
                /* Adjust the thickness of the underline */
                background: linear-gradient(to right, #cfac89, #98644f, #42332e);
                border-radius: 10px;
                /* Adjust the border-radius to make the underline rounded */
            }
        </style>
    </head>
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
                            <img src="{{ asset('images/notavailable.jpg') }}" alt="No Image"
                                class="d-block w-100 img-fluid">
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
        @else
            <p>No banners available</p>
        @endif
    </div>



    <div class="relative -mt-12 lg:-mt-24">
    </div>
    <section class="border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <div class="mb-3 menu-title-container">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 menu-title colorchange">
                    Selamat Datang di Website Kami
                </h1>
            </div>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <br><br><br><br>
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-6 custom-text-container">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        Classic
                    </h3>
                    <p class="text-gray-600 mb-8">
                        Classic adalah tempat yang tepat untuk memenuhi kebutuhan roti dan kue Anda. Kami memiliki roti
                        tawar, roti manis, roti gandum, kue tart, kue lapis, kue bolu, dan masih banyak lagi. Semua dibuat
                        dengan bahan-bahan pilihan dan resep tradisional. Datang dan rasakan sendiri kelezatannya!
                    </p>
                    <img src="/image/Keunggulan.png" alt="GUmum" class="custom-image-size">

                </div>

            </div>
            <br><br><br><br>
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-6 custom-text-container2">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        Keunggulan
                    </h3>
                    <p class="text-gray-600 mb-8">
                        1. Tanpa Pengawet: Kami hanya menggunakan bahan-bahan alami dan segar yang diolah dengan higienis.
                    </p>
                    <p class="text-gray-600 mb-8">
                        2. Harga terjangkau: Kami menawarkan harga yang terjangkau dan bersaing.
                    </p>
                    <p class="text-gray-600 mb-8">
                        3. Bervariasi: Kami memiliki berbagai macam varian produk yang dapat memenuhi selera dan kebutuhan
                        pelanggan.
                    </p>
                    <p class="text-gray-600 mb-8">
                        4. Pesanan Khusus: Kami melayani pesanan khusus untuk acara-acara tertentu, seperti ulang tahun,
                        pernikahan, atau pesta.
                    </p>
                </div>

            </div>
            <br>
            <br>
        </div>
    </section>

    </html>
@endsection

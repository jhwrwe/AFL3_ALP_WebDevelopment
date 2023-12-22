@extends('layouts.template')

@section('layout_content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homepage</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
        <style>
            .menu-title-container {
                margin-top: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .menu-title {
                position: relative;
                font-size: 2rem; /* Adjust the font size as needed */
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
    <div id="bannerCarousel" class="carousel slide" data-ride="carousel" style="max-height: 500px; overflow: hidden; position: relative;">
        <div class="carousel-inner">
            @if ($banner->count() > 0)
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            @foreach ($banner as $key => $singleBanner)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    @if ($singleBanner->photo)
                        <img src="{{ asset('storage/' . $singleBanner->photo) }}" alt="{{ $singleBanner->name }}" class="d-block w-100 img-fluid">
                        <div class="overlay"></div>
                    @else
                        <img src="{{ asset('images/notavailable.jpg') }}" alt="No Image" class="d-block w-100 img-fluid">
                    @endif
                </div>
            @endforeach
            </div>
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-target="#bannerCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#bannerCarousel" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="relative -mt-12 lg:-mt-24">
    </div>
    <section class="border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <div class="mb-3 menu-title-container">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 menu-title">
                    Selamat Datang di Website Kami
                </h1>
            </div>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-5/6 sm:w-1/2 p-6">
                    <br />
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        Lorem ipsum
                    </h3>
                    <p class="text-gray-600 mb-8">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                        <br />
                    </p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <img src="/images/EA.png" alt="GUmum">
                </div>
            </div>
            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <img src="/images/map.png" alt="map">
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                            Lorem ipsum
                        </h3>
                        <p class="text-gray-600 mb-8">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim
                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </html>
@endsection

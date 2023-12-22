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
            .gradient {
                background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
            }

            .bg-fbfff4 {
                background-color: #fbfff4;
            }
        </style>
    </head>

    <body class="bg-fbfff4">
        <br>
        <br>
        <br>
        @foreach($banner as $singleBanner)
    @if($singleBanner->photo)
        <div style ="max-height:350px; overflow:hidden">
            <img src="{{ asset('storage/'.$singleBanner->photo) }}" alt="{{ $singleBanner->name }}" class="img-fluid">
        </div>
    @else
        <img src="{{ asset('images/notavailable.jpg') }}" alt="No Image" class="img-fluid">
    @endif
@endforeach
        <div class="w-full bg-cover bg-center" style="height: 32rem; background-image: url(image/Banner1.jpg);">
            <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-50">
                <div class="text-center">
                    <br><br><br><br><br><br><br><br><br><br>
                    <h1 class="text-white text-2xl font-semibold uppercase md:text-3xl">Welcome to Our Website</h1>
                </div>
            </div>
        </div>


        <div class="relative -mt-12 lg:-mt-24">
        </div>
        <section class="bg-white border-b py-8">
            <div class="container max-w-5xl mx-auto m-8">
                <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    JUDUL
                </h2>
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
    </body>

    </html>
@endsection

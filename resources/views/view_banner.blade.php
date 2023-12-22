@extends('layouts.template')

@section('layout_content')
    <style>
        .container {
            background: #feeedd;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        h1 {
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .product {
            background: #feeedd;
            border-radius: 8px;
            padding: 20px;
            width: 48%; /* Adjust the width to fit two elements per row */
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .img-info {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
            margin-right: 20px;
        }
        @media (max-width: 768px) {
        .product {
            width: 100%; /* Set the width to 100% to stack elements vertically on smaller screens */
        }
    }
        .product-info {
            flex-grow: 1;
        }

        .btn-danger {
            color: white;
            background-color: #98644F;
            border-color: #98644F;
        }

        .btn-danger:hover {
            color: white;
            background-color: #d1150e;
            border-color: #d1150e;
        }

        .btn-info {
            color: white;
            background-color: #c47647;
            border-color: #c47647;
        }
        .btn-info:hover {
            color: white;
            background-color: #30d621;
            border-color: #30d621;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            /* Center the button */
        }

        .tambah-button {
            color: #cfac89;
            background-color: #42332e;
            /* Change the background color */
        }
        .tambah-button:hover {
            color: #42332e;
            background-color: #cfac89;
            /* Change the background color */
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
        }

        .menu-title::after {
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
    <div class="mt-5 mb-5 menu-title-container">
        <h1 class="w-full my-2 text-6xl font-bold leading-tight text-center text-gray-800 menu-title">
            List Banner
        </h1>
    </div>
    <div class="text-center">
        <div class="btn-group" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" roles="group" aria-label="Basic Example">
                <form method="GET" action="{{ route('create_banner') }}">
                    <button class="btn tambah-button" href="{{ route('create_banner') }}">
                        Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="product-container">
        @foreach ($banner as $pro)
            <div class="product">
                <img class="img-info" src="{{ asset('storage/' . $pro['photo']) }}" alt="{{ $pro->name }}">
                <div class="product-info">
                    <h3>{{ $pro['name'] }}</h3>
                    <p>{{ $pro['starting_time'] }}</p>
                    <p>{{ $pro['Ending_time'] }}</p>
                    <div>
                        <a href="{{ route('edit_banner', $pro) }}">
                            <button class="btn btn-info" id="edit" name="edit">Edit</button>
                        </a>
                        <form action="{{ route('banner_destroy', $pro) }}" method="POST">
                            @method('delete')
                            @csrf
                            <br>
                            <button class="btn btn-danger" id="delete" name="delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    <br>
@endsection

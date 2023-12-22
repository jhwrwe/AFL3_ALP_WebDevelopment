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
            width: 48%;
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
        }

        .tambah-button {
            color: #cfac89;
            background-color: #42332e;
        }

        .tambah-button:hover {
            color: #42332e;
            background-color: #cfac89;
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

    <div class="container mt-5 mb-5">
        <div class="menu-title-container">
            <h1 class="w-full my-2 text-6xl font-bold leading-tight text-center text-gray-800 menu-title">
                List Menu
            </h1>
        </div>
        <div class="text-end">
            <div class="btn-group" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" roles="group" aria-label="Basic Example">
                    <form method="GET" action="{{ route('create_menu') }}">
                        <button class="btn tambah-button" href="{{ route('create_menu') }}">
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="product-container">
        @foreach ($projects as $pro)
            <div class="product">
                <img class="img-info" src="{{ asset('storage/' . $pro['photo']) }}" alt="{{ $pro->name }}"
                    class="img-fluid">
                <div class="product-info">
                    <h3><a href="{{ route('Show_menu_clicked', $pro) }}">{{ $pro['name'] }}</a></h3>
                    <p>{{ $pro['price'] }}</p>
                    <p>{{ $pro['description'] }}</p>
                    <div>
                        <a href="{{ route('edit_menu', $pro) }}">
                            <button class="btn btn-info" id="edit" name="edit">Edit</button>
                        </a>
                        <form action="{{ route('menu_destroy', $pro) }}" method="POST">
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

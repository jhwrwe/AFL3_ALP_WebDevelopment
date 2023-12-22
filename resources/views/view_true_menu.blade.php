@extends('layouts.template')

@section('layout_content')
    <style>
        .product-grid {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            border: 1px solid #e7e7e7;
            margin-bottom: 20px;
            margin-left: 15px;
            margin-right: 15px;
            border-radius: 10px;
        }

        .product-grid .product-image {
            position: relative;
        }

        .product-grid .product-image a.image {
            display: block;
        }

        .product-grid .product-image img {
            width: 100%;
            height: auto;
            transition: all 0.3s ease 0s;
            border-radius: 10px;
        }

        .product-grid .product-image:hover img {
            transform: translate(10px, -10px);
        }

        .product-grid .product-sale-label {
            color: #fff;
            background: #1abc9c;
            font-size: 13px;
            text-transform: capitalize;
            line-height: 35px;
            width: 55px;
            height: 35px;
            position: absolute;
            top: 0;
            right: 0;
            animation: bg-animate 5s infinite linear;
        }

        .product-grid .product-links {
            padding: 0;
            margin: 0;
            list-style: none;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            bottom: 15px;
            left: 20px;
            transition: all 0.3s ease 0s;
        }

        .product-grid:hover .product-links {
            opacity: 1;
        }

        .product-grid .product-links li {
            margin: 0 0 5px;
            opacity: 0;
            transform: translateX(-100%);
            transition: all 0.3s ease 0s;
        }

        .product-grid:hover .product-links li:nth-child(2) {
            transition: all 0.3s ease 0.15s;
        }

        .product-grid:hover .product-links li {
            opacity: 1;
            transform: translateX(0);
        }

        .product-grid .product-links li a {
            color: #fff;
            background-color: #00b894;
            font-size: 14px;
            text-shadow: 0 0 3px rgba(0, 0, 0, 0.7);
            padding: 8px 10px;
            display: block;
            opacity: 0.9;
            transition: all 0.3s ease 0s;
            animation: bg-animate 5s infinite linear;
        }

        .product-grid .product-links li a:hover {
            color: #fff;
            box-shadow: 0 0 0 3px #fff inset;
            opacity: 1;
        }

        .product-grid .product-links li a i {
            margin: 0 5px 0 0;
        }

        .product-grid .product-content {
            padding: 15px 0 5px;
        }

        .product-grid .title {
            font-size: 17px;
            font-weight: 400;
            text-transform: capitalize;
            padding: 0 10px 14px;
            margin: 0 0 7px;
            border-bottom: 1px solid #dfe5e9;
        }

        .product-grid .title a {
            color: #000;
            transition: all 0.3s ease 0s;
        }

        .product-grid .title a:hover {
            animation: color-animate 5s infinite linear;
        }

        .product-grid .price {
            color: #1abc9c;
            font-size: 20px;
            font-weight: 400;
            animation: color-animate 5s infinite linear;
        }

        .product-grid .price span {
            color: #999;
            text-decoration: line-through;
            margin: 0 3px 0 0;
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

        @keyframes bg-animate {
            0% {
                background-color: #cfac89;
            }

            20% {
                background-color: #c68c5f;
            }

            40% {
                background-color: #c47647;
            }

            60% {
                background-color: #42332e;
            }

            80% {
                background-color: #000000;
            }

            100% {
                background-color: #cfac89;
            }
        }

        @media screen and (max-width:1200px) {
            .product-grid {
                margin: 0 0 30px;
            }
        }

        .product-grid .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            aspect-ratio: 1/1;
        }

        body {
            overflow-x: hidden;
        }

        .category-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: -30px;
        }

        .category-dropdown {
            margin-top: 100px;
            margin-left: 20px;
            display: inline-block;
            margin-right: 20px;
        }

        .category-dropdown .btn-primary {
            padding: 10px 20px;
            background-color: #c68c5f;
            border-color: #c68c5f;
            text-align: center;
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
            /* Adjust the distance between the text and the underline */
            width: 100%;
            height: 5px;
            /* Adjust the thickness of the underline */
            background: linear-gradient(to right, #cfac89, #98644f, #42332e);
            border-radius: 10px;
            /* Adjust the border-radius to make the underline rounded */
        }

        /*
        Color
        #cfac89
        #c68c5f
        #c47647
        #98644F
        #42332e
         */
    </style>

    <div class="mb-3">
        <div class="mb-3 menu-title-container">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 menu-title">
                MENU
            </h1>
        </div>

        <!-- Category Dropdown -->
        <div class="category-container">
            <div class="category-dropdown">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="categoryDropdownButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Kategori
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdownButton">
                        @foreach ($category as $cat)
                            <li><a class="dropdown-item"
                                    href="{{ route('view_true_menu', ['category_id' => $cat->id]) }}">{{ $cat->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Search Form -->
        {{-- <form action="{{ route('view_true_menu') }}" method="GET" class="form-inline w-25 d-flex gap-2">
        <label for="category_id" class="form-label">category</label>
        <select name="category_id" id="category_id" required>
            @foreach ($category as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-success">Search</button>
    </form> --}}
    </div>

    <div class="row">
        @foreach ($projects as $pro)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="{{ route('Show_menu_clicked', $pro->menu->id) }}" class="image">
                            <img src="{{ asset('storage/' . $pro->menu->photo) }}" alt="{{ $pro->menu->photo }}"
                                class="img-fluid">
                        </a>
                        <ul class="product-links">
                            <!-- You can customize the actions here -->
                            <li><a href="/menu/ordered/{{ $pro->menu->id }}"><i class="fa fa-shopping-bag"></i>Masukkan Keranjang</a></li>
                            <li><a href="{{ route('Show_menu_clicked', $pro->menu->id) }}"><i class="fa fa-search"></i>Detail</a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a
                                href="{{ route('Show_menu_clicked', $pro->menu->id) }}">{{ $pro->menu->name }}</a></h3>
                        <div class="price">Rp.{{ $pro->menu->price }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

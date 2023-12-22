    @extends('layouts.template')

@section('layout_content')
    <style>
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .product {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 48%;
            /* Adjust the width as needed */
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .custom-btn {
            background-color: #98644F;
        }

        .img-info {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 20%;
            margin-right: 20px;
        }

        .product-info {
            flex-grow: 1;
        }
    </style>
    <div class="container mt-3 mb-5">
        <div class="header">
            <h1>{{ $menu['name'] }}</h1>
        </div>
    </div>

    <div class="product-container">
        <div class="product">
            <img class="img-info" src="{{ asset('storage/' . $menu['photo']) }}" alt="{{ $menu->name }}">
            <div class="product-info">
                <p>{{ $menu['description'] }}</p>
                <p>Price: ${{ $menu['price'] }}</p>
            </div>
        </div>
    </div>


    @if (Auth::user()->isUser())
        <div class ="contaianer mt-5">
            <form action="{{ route('order_store', $menu) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name ="tanggal" placeholder="Your title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="location" name ="location"
                        placeholder="Masukkan Lokasi Anda">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                    <input type="text" class="form-control" id="quantity" name ="quantity" placeholder="Jumlah Produk">
                </div>
        </div>
        <button type="submit" class="btn btn-primary custom-btn">Pesan</button>
        </form>
        </div>
        <br>
        <br>
    @endif
@endsection

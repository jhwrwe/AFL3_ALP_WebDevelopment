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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
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
            /* Adjust the width as needed */
            margin-bottom: 10px;
            display: flex;
            align-items: center;
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

        .reviews-table {
            margin-top: 20px;
        }

        .reviews-table th,
        .reviews-table td {
            text-align: center;
        }

        .container-form {
            margin-top: 20px;
        }

        .container-form form {
            margin-top: 20px;
        }

        .btn-danger {
            background-color: #d9534f;
            border-color: #d9534f;
        }

        .btn-danger:hover {
            background-color: #c9302c;
            border-color: #c9302c;
        }

        .review-section {
            background-color: #eaccad;
            padding: 4rem 1rem;
            text-align: center;
        }

        .review-card {
            background-color: #fff;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
            padding: -5%;
        }

        .review-avatar {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .review-content {
            padding: 1rem;
        }

        .review-author {
            font-weight: bold;
        }

        .review-role {
            color: #6c757d;
        }
    </style>
    <div class="container mt-5 mb-5">
        <div class="header">
            <h1>{{ $menu['name'] }}</h1>
        </div>
    </div>

    <div class="product-container">
        <div class="product">
            <img class="img-info" src="{{ asset('storage/' . $menu['photo']) }}" alt="{{ $menu->name }}">
            <div class="product-info">
                <p>{{ $menu['description'] }}</p>
                <p>Harga: ${{ $menu['price'] }}</p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <form action="{{ route('order_store', $menu) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="location" name="location"
                    placeholder="Masukkan Lokasi Anda">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                <div class="input-group">
                    <button type="button" class="btn btn-outline-secondary" id="minus-btn">-</button>
                    <input type="text" class="form-control" id="quantity" name="Kuantitas" value="1" readonly>
                    <button type="button" class="btn btn-outline-secondary" id="plus-btn">+</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Quantity increment/decrement logic
            $('#plus-btn').click(function() {
                var quantityInput = $('#quantity');
                quantityInput.val(parseInt(quantityInput.val()) + 1);
            });

            $('#minus-btn').click(function() {
                var quantityInput = $('#quantity');
                var currentValue = parseInt(quantityInput.val());
                if (currentValue > 1) {
                    quantityInput.val(currentValue - 1);
                }
            });
        });
    </script>
    <br><br>
@endsection

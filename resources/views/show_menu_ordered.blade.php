@extends('layouts.template')

@section('layout_content')

<div class="container mt-5 mb-5">
    <h1>Your Projects</h1>

    <table class="table table-striped">
        <tr>
            <th>name</th>
            <th>price</th>
            <th>description</th>
            <th>photo</th>
        </tr>
        <tr>
            <td>{{ $menu['name'] }}</a></td>
            <td>{{ $menu['price'] }}</td>
            <td>{{ $menu['description'] }}</td>
            <td>
                @if($menu->photo)
                <div style="max-height:350px; overflow:hidden">
                    <img src="{{ asset('storage/'.$menu['photo']) }}" alt="{{ $menu->name }}" class="img-fluid">
                </div>
                @else
                <img src="{{ asset('images/notavailable.jpg') }}" alt="No Image" class="img-fluid">
                @endif
            </td>
    </table>


    <div class="container mt-5">
        <form action="{{ route('order_store', $menu) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Your title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Your price">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">quantity</label>
                <div class="input-group">
                    <button type="button" class="btn btn-outline-secondary" id="minus-btn">-</button>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="1" readonly>
                    <button type="button" class="btn btn-outline-secondary" id="plus-btn">+</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Quantity increment/decrement logic
            $('#plus-btn').click(function () {
                var quantityInput = $('#quantity');
                quantityInput.val(parseInt(quantityInput.val()) + 1);
            });

            $('#minus-btn').click(function () {
                var quantityInput = $('#quantity');
                var currentValue = parseInt(quantityInput.val());
                if (currentValue > 1) {
                    quantityInput.val(currentValue - 1);
                }
            });
        });
    </script>


    @endsection

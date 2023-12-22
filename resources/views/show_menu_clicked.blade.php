@extends('layouts.template')

@section('layout_content')
    <style>
        body {
            background: #f4f4f4;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            background: #fff;
            border: 1px solid #ddd;
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
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 48%; /* Adjust the width as needed */
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        img {
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
    </style>

    <div class="container mt-5 mb-5">
        <div class="header">
            <h1>{{ $menu['name'] }}</h1>
        </div>
    </div>

    <div class="product-container">
        <div class="product">
            <img src="{{ asset('storage/' . $menu['photo']) }}" alt="{{ $menu->name }}">
            <div class="product-info">
                <p>{{ $menu['description'] }}</p>
                <p>Price: ${{ $menu['price'] }}</p>
            </div>
        </div>
    </div>

    <table class="table table-striped reviews-table">
        <thead>
            <tr>
                <th>User</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                @if ($review->menu_id == $menu->id)
                    <tr>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->title }}</td>
                        <td>{{ $review->description }}</td>
                        <td>
                            @if (Auth::id() == $review->user_id)
                                <form action="{{ route('review_destroy', $review) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" id="delete" name="delete">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
        @if(Auth::user()->isUser())
            <div class ="contaianer mt-5">
              <form action="{{ route('store_review',$menu) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name ="title" placeholder="Your title">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">description</label>
                <input type="text" class="form-control" id="description" name ="description" placeholder="Your price">
              </div>

              </div>
              <button type ="submit" class="btn btn-primary">submit</button>
              </form>
            </div>
            @endif

@endsection

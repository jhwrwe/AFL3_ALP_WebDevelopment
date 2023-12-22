@extends('layouts.template')

@section('layout_content')
    <style>
          body {
            background: #f4f4f4;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            background: #fff;
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
            border-radius: 8px;
            padding: 20px;
            width: 48%; /* Adjust the width as needed */
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
            background-color: #d2d2d2;
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
                <p>Price: ${{ $menu['price'] }}</p>
            </div>
        </div>
    </div>

    <div class="review-section p-4 p-md-5 text-center text-lg-start shadow-1-strong rounded">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <h3 class="comment-text d-flex justify-content-center align-items-center">Komentar</h3>
            </div>
            @foreach ($reviews as $review)
            @if ($review->menu_id == $menu->id)
                <div class="col-md-5 p-4">
                    <div class="card review-card">
                        <div class="card-body m-2 review-content">
                            <div class="row">
                                <div class="col-lg-3 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                                    <img src="{{ asset('storage/'.$review->user->photo) }}"
                                        class="rounded-circle img-fluid shadow-1 review-avatar"
                                        alt="user avatar" style="width: 80px; height: 80px;" /> <!-- Adjust width and height as needed -->
                                </div>
                                <div class="col-lg-8">
                                    <p class="text-muted fw-bold mb-4">{{ $review->user->name }}</p>
                                    <p class="fw-bold lead mb-2 review-author"><strong>{{ $review->title }}</strong></p>
                                    <p class="fw-bold text-muted mb-0 review-role">{{ $review->description }}</p>
                                    @if(Auth::id()==$review->user_id)
                                        <form action="{{ route('review_destroy', $review) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" id="delete" name="delete">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        </div>
    </div>

    @if (Auth::user()->isUser())
        <div class="container mt-5">
            <form action="{{ route('store_review', $menu) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Your title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Your description">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endif
@endsection

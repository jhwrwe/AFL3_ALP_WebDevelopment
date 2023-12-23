@extends('layouts.template')
@section('layout_content')
    <style>
        .img-preview {
            object-fit: cover;
            /* Ensure a 1:1 aspect ratio and cover the container */
            height: 300px;
            /* Set a fixed height for the container */
            width: 300px;
            /* Take full width of the container */
            border-radius: 8px;
            /* Optional: Add border-radius for a rounded appearance */
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
            /* Adjust the font size as needed */
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

        .btn-primary {
            color: #cfac89;
            background-color: #42332e;
            border: #cfac89 solid 1px;
        }

        .btn-primary:hover {
            color: #42332e;
            background-color: #cfac89;
            border: #42332e solid 1px;
        }
    </style>
    <div>
        <div class="mb-3 menu-title-container">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 menu-title">
                Tambah Kategori & Menu
            </h1>
        </div>
        <div class="container mt-5">
            <form action="{{ route('category_menu_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" required>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="menu_id" class="form-label">Menu</label>
                    <select name="menu_id" id="menu_id" required>
                        @foreach ($menu as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <br>
@endsection

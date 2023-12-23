@extends('layouts.template')
@section('layout_content')
    <style>
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

    <div class="container mt-5">
        <div class="mb-3 menu-title-container">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 menu-title">
                Tambah Kategori
            </h1>
        </div>
        <form action="{{ route('category_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="Masukkan Nama Kategori">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="description" name="description"
                    placeholder="Your description">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br>
@endsection

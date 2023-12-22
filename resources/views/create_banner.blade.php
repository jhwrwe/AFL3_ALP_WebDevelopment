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
                Tambah Banner
            </h1>
        </div>
        <div class="container mt-5">
            <form method="POST" action="{{ route('banner_store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Banner</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan Nama Banner">
                </div>

                <div class="mb-3">
                    <label for="starting_time" class="form-label">Mulai:</label>
                    <input type="date" class="form-control" id="starting_time" name="starting_time">
                </div>
                <div class="mb-3">
                    <label for="Ending_time" class="form-label">Selesai:</label>
                    <input type="date" class="form-control" id="Ending_time" name="Ending_time">
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Upload Gambar</label>
                    <div x-data="{ imagePreview: '' }">
                        <img x-bind:src="imagePreview" alt="Image Preview" class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="photo" name="photo"
                            accept="image/jpg, image/png, image/jpeg" onchange="previewImage()">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Buat Banner</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
        <script>
            function previewImage() {
                const image = document.querySelector('#photo');
                const imgPreview = document.querySelector('.img-preview');
                const ofReader = new FileReader();
                ofReader.readAsDataURL(image.files[0]);
                ofReader.onload = function(oFRevent) {
                    imgPreview.src = oFRevent.target.result;
                }
            }
        </script>
    </div>
    <br>
@endsection

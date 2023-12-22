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
</style>
<div>
    <div class="mb-3 menu-title-container">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 menu-title">
            Tambah Kategori
        </h1>
    </div>
<div class="container mt-5">
    <form action="{{ route('menu_update', $menuEdit) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your name"
                value="{{ $menuEdit->name }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Your phone"
                value="{{ $menuEdit->price }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Your sosmed"
                value="{{ $menuEdit->description }}">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Update Image</label>
            <div x-data="{ imagePreview: '' }">
                <input class="form-control" type="file" id="photo" name="photo" accept="image/jpg, image/png, image/jpeg"
                    x-on:change="imagePreview = URL.createObjectURL($event.target.files[0])">
                <img x-bind:src="imagePreview" alt="Image Preview" class="img-preview img-fluid mb-3 col-sm-5"
                    x-show="imagePreview">
            </div>
        </div>
        {{-- <div class="mb-3">
            <label for="student" class="form-label">Student</label>
            <select name="student" id="student" required>
                @foreach($Extracurricular as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
<script>
    function previewImage() {
        const image = document.querySelector('#photo');
        const imgPreview = document.querySelector('.img-preview');
        const ofReader = new FileReader();
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);
        ofReader.onload = function (oFRevent) {
            imgPreview.src = oFRevent.target.result;
        }
    }
</script>
</div>
<br>
@endsection

@extends('layouts.template')
@section('layout_content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('banner_store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your banner name">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Upload Image</label>
                <div x-data="{ imagePreview: '' }">
                    <img x-bind:src="imagePreview" alt="Image Preview" class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="photo" name="photo"
                        accept="image/jpg, image/png, image/jpeg" onchange="previewImage()">
                </div>
            </div>
            <div class="mb-3">
                <label for="starting_time" class="form-label">Starting time:</label>
                <input type="date" class="form-control" id="starting_time" name="starting_time">
            </div>
            <div class="mb-3">
                <label for="Ending_time" class="form-label">Ending time:</label>
                <input type="date" class="form-control" id="Ending_time" name="Ending_time">
            </div>
            <button type="submit" class="btn btn-primary">Create Banner</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
    <script>
        function previewImage() {
            const image = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFRevent) {
                imgPreview.src = oFRevent.target.result;
            }
        }
    </script>
@endsection

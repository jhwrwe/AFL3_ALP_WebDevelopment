@extends('layouts.template')
@section('layout_content')

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
        <button type="submit" class="btn btn-primary">Submit</button>
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

@endsection

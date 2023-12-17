@extends('layouts.template')
@section('layout_content')

<div class ="contaianer mt-5">
  <form action="{{ route('menu_store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">name</label>
    <input type="text" class="form-control" id="name" name ="name" placeholder="Your name">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">price</label>
    <input type="number" class="form-control" id="price" name ="price" placeholder="Your price">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">description</label>
    <input type="text" class="form-control" id="description" name ="description" placeholder="Your description">
  </div>
  <div class="mb-3">
    <label for ="photo" class ="form-label">Upload Image</label>
    <img class = "img-preview img-fluid mb-3 col-sm-5">
    <input class ="form-control" type="file" id ="photo" name ="photo" accept="image/jpg, image/png, image/jpeg" onchange="previewImage()">
    </div>


  {{-- <div class = "mb-3">
    <label for="student" class = "form-label">student</label>
    <select name="student" id="student" required>
        @foreach($Extracurricular as $student)
        <option value = "{{ $student->id }}">{{ $student->name }}</option>

        @endforeach
    </select> --}}
  </div>
  <button type ="submit" class="btn btn-primary">submit</button>
  </form>
</div>
<script>
    function previewImage(){
        const image = document.querySelector('#photo');
        const imgPreview = document.querySelector('.img-preview');
        const ofReader = new FileReader();
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);
        ofReader.onload = function(oFRevent){
            imgPreview.src = oFRevent.target.result;
        }
    }
    </script>


@endsection

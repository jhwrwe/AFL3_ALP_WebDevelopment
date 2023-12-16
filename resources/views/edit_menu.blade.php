@extends('layouts.template')
@section('layout_content')

<div class ="contaianer mt-5">
  <form action="{{ route('update',$menuEdit) }}" method="POST">
    @method('put')
  @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">name</label>
    <input type="text" class="form-control" id="name" name ="name" placeholder="Your name" value="{{ $menuEdit->name}}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">phone</label>
    <input type="number" class="form-control" id="phone" name ="phone" placeholder="Your phone" value="{{ $menuEdit->price }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">sosmed</label>
    <input type="text" class="form-control" id="sosmed" name ="sosmed" placeholder="Your sosmed" value="{{ $menuEdit->description }}">
  </div>
</div>
<div class="mb-3">
  <label for ="photo" class ="form-label">Update image</label>
  @if($menuEdit->photo)
  <img src="{{ asset('storage/'.$menuEdit->photo) }}" alt="{{ $menuEdi->name }}">
  @else
  <img class = "img-preview img-fluid mb-3 col-sm-5">
  @endif
  <input class ="form-control" type="file" id ="photo" name ="photo" accept="image/jpg, image/png, image/jpeg" onchange="previewImage()">
  </div>
  {{-- <div class = "mb-3">
    <label for="student" class = "form-label">student</label>
    <select name="student" id="student" required>
        @foreach($Extracurricular as $student)
        <option value = "{{ $student->id }}">{{ $student->name }}</option>

        @endforeach
    </select>
  </div> --}}
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

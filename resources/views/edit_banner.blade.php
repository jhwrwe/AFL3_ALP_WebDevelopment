
@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('update_banner',$BannerEdit) }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">name</label>
            <input type="text" class="form-control" id="name" name ="name" placeholder="Your banner name" value="{{ $BannerEdit->name }}">
          </div>
          <div class="mb-3">
            <label for ="photo" class ="form-label">Update image</label>
            @if($BannerEdit->photo)
            <img src="{{ asset('storage/'.$BannerEdit->photo) }}" alt="{{ $BannerEdit->name }}">
            @else
            <img class = "img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class ="form-control" type="file" id ="photo" name ="photo" accept="image/jpg, image/png, image/jpeg" onchange="previewImage()">
            </div>
            <div class="mb-3">
                <label for="starting_time" class="form-label">Starting time:</label>
                <input type="date" class="form-control" id="starting_time" name ="starting_time" value="{{ $BannerEdit->starting_time }}">
              </div>
              <div class="mb-3">
                <label for="Ending_time" class="form-label">Ending time:</label>
                <input type="date" class="form-control" id="Ending_time" name ="Ending_time" value="{{ $BannerEdit->Ending_time }}">
              </div>
        <button type="submit">Create Banner</button>
    </form>
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



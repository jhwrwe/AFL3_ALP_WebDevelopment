@extends('layouts.template')
@section('layout_content')

<div class ="contaianer mt-5">
  <form action="{{ route('status_update',$statusEdit) }}" method="POST" enctype="multipart/form-data">
    @method('put')
  @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">description</label>
    <input type="text" class="form-control" id="status" name ="status" placeholder="Your sosmed" value="{{ $statusEdit->status }}">
  </div>
</div>
  <button type ="submit" class="btn btn-primary">submit</button>
  </form>
</div>

@endsection

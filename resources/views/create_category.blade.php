@extends('layouts.template')
@section('layout_content')

<div class="container mt-5">
    <form action="{{ route('category_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                placeholder="Your description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

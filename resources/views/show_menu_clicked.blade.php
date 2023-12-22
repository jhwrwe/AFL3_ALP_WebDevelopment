@extends('layouts.template')

@section('layout_content')

<div class="container mt-5 mb-5">
    <h1>Your Projects</h1>
</div>

<table class="table table-striped">
    <tr>

        <th>name</th>
        <th>price</th>
        <th>description</th>
        <th>photo</th>
        <th>actions</th>
    </tr>
            <tr>

                <td><a href="/menu/ordered/{{ $menu->id }}">{{ $menu['name'] }}</a></td>
                <td>{{ $menu['price'] }}</td>
                <td>{{ $menu['description'] }}</td>
                <td>
                    @if($menu->photo)
                    <div style ="max-height:350px; overflow:hidden">
                        <img src="{{ asset('storage/'.$menu['photo']) }}" alt="{{ $menu->name }}" class="img-fluid">
                    </div>
                    @else
                        <img src="{{ asset('images/notavailable.jpg') }}" alt="No Image" class="img-fluid">
                    @endif
                </td>
            </table>
            <table class="table table-striped">
                <tr>
                <th>user</th>
                <th>title</th>
                <th>description</th>
                <th>Actions</th>
                </tr>
            @foreach ($reviews  as $review )
            @if($review->menu_id == $menu->id)
<tr>
    <td>{{ $review->user->name}}</td>
    
    <td>{{ $review->title }}</td>
    <td>{{ $review->description }}</td>
    <td>
        {{-- <a href="{{ route('edit_review',$review) }}">
            <button class="btn btn-info" id="edit" name="edit">Edit</button>
        </a> --}}
        @if(Auth::id()==$review->user_id)
        <form action="{{ route('review_destroy', $review) }}" method="POST">
            @method('delete')
            @csrf
            <button class="btn btn-danger" id="delete" name="delete">Delete</button>
        </form>
        @endif
    </td>
</tr>

@endif

            @endforeach
        </table>
        @if(Auth::user()->isUser())
            <div class ="contaianer mt-5">
              <form action="{{ route('store_review',$menu) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name ="title" placeholder="Your title">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">description</label>
                <input type="text" class="form-control" id="description" name ="description" placeholder="Your price">
              </div>

              </div>
              <button type ="submit" class="btn btn-primary">submit</button>
              </form>
            </div>
            @endif

@endsection

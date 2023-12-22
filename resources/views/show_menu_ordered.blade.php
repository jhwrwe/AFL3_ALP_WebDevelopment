@extends('layouts.template')

@section('layout_content')

<div class="container mt-5 mb-5">
    <h1>Your Projects</h1>


<table class="table table-striped">
    <tr>

        <th>name</th>
        <th>price</th>
        <th>description</th>
        <th>photo</th>
    </tr>
            <tr>

                <td>{{ $menu['name'] }}</a></td>
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

@if(Auth::user()->isUser())
<div class ="contaianer mt-5">
    <form action="{{ route('order_store', $menu) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">tanggal</label>
      <input type="date" class="form-control" id="tanggal" name ="tanggal" placeholder="Your title">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">location</label>
      <input type="text" class="form-control" id="location" name ="location" placeholder="Your price">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">quantity</label>
        <input type="text" class="form-control" id="quantity" name ="quantity" placeholder="Your price">
      </div>
    </div>
    <button type ="submit" class="btn btn-primary">submit</button>
    </form>
  </div>

  @endif

@endsection

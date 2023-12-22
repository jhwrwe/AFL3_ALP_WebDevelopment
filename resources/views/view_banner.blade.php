@extends('layouts.template')

@section('layout_content')

<div class="container mt-5 mb-5">
    <h1>Your Projects</h1>
    <div class="text-end">
        <div class="btn-group" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" roles="group" aria-label="Basic Example">
                <form method="GET" action="{{ route('create_banner') }}">
                    <button class="btn btn-primary" href="{{ route('create_banner') }}">
                        Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<form action="/view_menu" method="GET" class="form-inline w-25 d-flex gap-2">
    <input class="form-control" type="search" name="search" placeholder="Search">
    <button type="submit" class="btn btn-outline-success">Search</button>
</form>

<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>name</th>
        <th>image</th>
        <th>starting date</th>
        <th>ending date</th>
        <th>actions</th>
    </tr>
    @foreach($banner as $pro)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $pro['name'] }}</td>
                <td>
                    @if($pro->photo)
                    <div style ="max-height:350px; overflow:hidden">
                        <img src="{{ asset('storage/'.$pro['photo']) }}" alt="{{ $pro->name }}" class="img-fluid">
                    </div>
                    @else
                        <img src="{{ asset('images/notavailable.jpg') }}" alt="No Image" class="img-fluid">
                    @endif

                </td>
                <td>{{ $pro['starting_time'] }}</td>
                <td>{{ $pro['Ending_time'] }}</td>
                <td>
                    <a href="{{ route('edit_banner',$pro) }}">
                        <button class="btn btn-info" id="edit_banner" name="edit_banner">edit</button>
                    </a>
                    <form action="{{ route('banner_destroy', $pro) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" id="delete" name="delete">Delete</button>
                    </form>
                </td>

    @endforeach
</table>

<div>

</div>

@endsection

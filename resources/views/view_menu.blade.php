@extends('layouts.template')

@section('layout_content')
<!-- Original view: resources/views/layouts/template.blade.php -->
{{--
@include('search') --}}
<div class="container mt-5 mb-5">
    <h1>Your Projects</h1>
    <div class="text-end">
        <div class="btn-group" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" roles="group" aria-label="Basic Example">
                <form method="GET" action="{{ route('create_menu') }}">
                    <button class="btn btn-primary" href="{{ route('create_menu') }}">
                        Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('search_menu') }}" method="GET" class="form-inline w-25 d-flex gap-2">
    <input class="form-control" type="search" name="search" placeholder="Search">
    <button type="submit" class="btn btn-outline-success">Search</button>
</form>

<table class="table table-striped">
    <tr>
        <th>NO</th>
        <th>name</th>
        <th>price</th>



        <th>description</th>
        <th>photo</th>
        <th>actions</th>
    </tr>
    @foreach($projects as $pro)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><a href="{{ route('Show_menu_clicked',$pro) }}">{{ $pro['name'] }}</a></td>
                <td>{{ $pro['price'] }}</td>
                <td>{{ $pro['description'] }}</td>
                <td>
                    @if($pro->photo)
                    <div style ="max-height:350px; overflow:hidden">
                        <img src="{{ asset('storage/'.$pro['photo']) }}" alt="{{ $pro->name }}" class="img-fluid">
                    </div>
                    @else
                        <img src="{{ asset('images/notavailable.jpg') }}" alt="No Image" class="img-fluid">
                    @endif

                </td>
                <td>
                    <a href="{{ route('edit_menu',$pro) }}">
                        <button class="btn btn-info" id="edit" name="edit">Edit</button>
                    </a>
                    <form action="{{ route('menu_destroy', $pro) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" id="delete" name="delete">Delete</button>
                    </form>
                </td>

    @endforeach
</table>

<div>
    {{ $projects->links() }}
</div>

@endsection

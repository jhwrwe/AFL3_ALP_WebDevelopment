@extends('layouts.template')

@section('layout_content')
<div class="container mt-5 mb-5">
    <h1>Your Projects</h1>
    <div class="text-end">
        <div class="btn-group" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" roles="group" aria-label="Basic Example">
                <form method="GET" action="{{ route('create_category_menu') }}">
                    <button class="btn btn-primary" href="{{ route('create_category_menu') }}">
                        Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<table class="table table-striped">
    <tr>
        <th>NO</th>
        <th>category_id</th>
        <th>menu_id</th>
        <th>actions</th>
    </tr>
    @foreach($projects as $pro)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $pro['category_id'] }}</td>
                <td>{{ $pro['menu_id'] }}</td>
                <td>
                    <a href="{{ route('edit_menu',$pro) }}">
                        <button class="btn btn-info" id="edit" name="edit">Edit</button>
                    </a>
                    <form action="{{ route('category_menu_destroy', $pro) }}" method="POST">
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

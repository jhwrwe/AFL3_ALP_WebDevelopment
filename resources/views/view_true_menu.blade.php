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

<div class="mb-3">
    <form action="{{ route('view_true_menu') }}" method="GET" class="form-inline w-25 d-flex gap-2">
    <label for="category_id" class="form-label">category</label>
    <select name="category_id" id="category_id" required>
        @foreach($category as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-outline-success">Search</button>
    </form>
</div>

<table class="table table-striped">
    <tr>
        <th>NO</th>
        <th>name</th>
        <th>actions</th>
    </tr>
    @foreach($projects as $pro)
            <tr>
                <td><a href="{{ route('Show_menu_clicked',$pro->menu->id) }}">{{ $loop->index + 1 }}</a></td>
                <td>{{ $pro->menu->name }}</td>

    @endforeach
</table>

@endsection
@extends('layouts.template')
@section('layout_content')

<div class="container mt-5">
    <form action="{{ route('category_menu_store') }}" method="POST" enctype="multipart/form-data">
        @csrf   
        <div class="mb-3">
            <label for="category_id" class="form-label">category</label>
            <select name="category_id" id="category_id" required>
                @foreach($category as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="menu_id" class="form-label">menu</label>
            <select name="menu_id" id="menu_id" required>
                @foreach($menu as $menu)
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection

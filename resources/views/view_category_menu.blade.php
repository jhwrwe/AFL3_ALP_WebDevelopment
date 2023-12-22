@extends('layouts.template')

@section('layout_content')
    <style>
        .container {
            background: #feeedd;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        h1 {
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .product {
            background: #feeedd;
            border-radius: 8px;
            padding: 20px;
            width: 48%;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .img-info {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
            margin-right: 20px;
        }

        @media (max-width: 768px) {
            .product {
                width: 100%;
            }
        }

        .product-info {
            flex-grow: 1;
        }

        .btn-primary {
            color: #cfac89;
            background-color: #42332e;
            width: 100%;
            border: #cfac89 solid 1px;
        }

        .btn-danger {
            color: white;
            background-color: #98644F;
            border-color: #98644F;
        }

        .btn-danger:hover {
            color: white;
            background-color: #d1150e;
            border-color: #d1150e;
        }

        .btn-info {
            width: 70px;
            color: white;
            background-color: #c47647;
            border-color: #c47647;
        }

        .btn-info:hover {
            color: white;
            background-color: #30d621;
            border-color: #30d621;
        }

        .btn-primary:hover {
            color: #42332e;
            background-color: #cfac89;
            border: #42332e solid 1px;
        }

        .menu-title-container {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu-title {
            position: relative;
            font-size: 2rem;
        }

        .menu-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #cfac89, #98644f, #42332e);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            text-align: center;
            padding: 10px;
        }

        th:nth-child(odd),
        td:nth-child(odd) {
            background-color: #42332e;
            color: #cfac89;
        }

        th:nth-child(even),
        td:nth-child(even) {
            background-color: #cfac89;
            color: #42332e;
        }
    </style>
    <div class="mt-5 mb-5 menu-title-container">
        <h1 class="w-full my-2 text-6xl font-bold leading-tight text-center text-gray-800 menu-title">
            List Kategori & Menu
        </h1>
    </div>
    <div class="text-center"> <!-- Updated this div with text-center class -->
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
    <br>

    <table class="table table-striped">
        <tr>
            <th>NO</th>
            <th>Kategori</th>
            <th>Menu</th>
            <th>Aksi</th>
        </tr>
        @foreach ($projects as $pro)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $pro['category_id'] }}</td>
                <td>{{ $pro['menu_id'] }}</td>
                <td>
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
    </div>
    <br>
@endsection

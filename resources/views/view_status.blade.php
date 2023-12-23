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
            /* Adjust the width to fit two elements per row */
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
                /* Set the width to 100% to stack elements vertically on smaller screens */
            }
        }

        .product-info {
            flex-grow: 1;
        }

        .btn-danger,
        .btn-info {
            width: 30%;
            /* Make the buttons take the full width */
            padding: 2px;
            /* Add padding to the buttons */
            margin: 2px;
        }

        .btn-danger,
        .btn-danger:hover,
        .btn-info,
        .btn-info:hover {
            border-radius: 5px;
            /* Add border-radius for a rounded look */
        }

        .tambah-primary {
            color: #cfac89;
            background-color: #42332e;
            width: 100%;
            /* Change the background color */
        }

        .tambah-primary:hover {
            color: #42332e;
            background-color: #cfac89;
            /* Change the background color */
        }

        .btn-danger {
            color: white;
            background-color: #98644F;
            border-color: #98644F;
        }

        .btn-danger:hover {
            background-color: #d1150e;
            border-color: #d1150e;
        }

        .btn-info {
            color: white;
            background-color: #c47647;
            border-color: #c47647;
        }

        .btn-info:hover {
            background-color: #30d621;
            border-color: #30d621;
        }

        .btn-primary {
            color: white;
            background-color: #4285f4;
            /* Adjust the color for the primary button */
            border-color: #4285f4;
        }

        .btn-primary:hover {
            background-color: #1a73e8;
            /* Adjust the color for the primary button on hover */
            border-color: #1a73e8;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            /* Center the button */
        }

        .tambah-button {
            color: #cfac89;
            background-color: #42332e;
            /* Change the background color */
        }

        .tambah-button:hover {
            color: #42332e;
            background-color: #cfac89;
            /* Change the background color */
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
            /* Set the border-radius for rounded corners */
            overflow: hidden;
            /* Hide overflow to ensure corners are rounded */
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
        .btn-primary {
        width: 70px;
            color: #cfac89;
            background-color: #42332e;
            border: #cfac89 solid 1px;
        }

        .btn-primary:hover {
            color: #42332e;
            background-color: #cfac89;
            border: #42332e solid 1px;
        }
    </style>
    <div>
        <div class="mb-3 menu-title-container">
            <h1 class="w-full text-5xl font-bold leading-tight text-center text-gray-800 menu-title">
                Status Order
            </h1>
        </div>
        <br>
    <table class="table table-striped">
        <tr>
            <th>NO</th>
            <th>status_id</th>
            <th>status</th>
            <th>description</th>
            <th>photo</th>
            <th>actions</th>
        </tr>
        @foreach ($projects as $pro)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $pro['id'] }}</a></td>
                <td>{{ $pro['status'] }}</td>
                <td>
                    <a href="{{ route('edit_status', $pro) }}">
                        <button class="btn btn-info" id="edit" name="edit">Edit</button>
                    </a>
                    <form action="{{ route('status_destroy', $pro) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" id="delete" name="delete">Delete</button>
                    </form>
                </td>
        @endforeach
    </table>
    <div class ="contaianer mt-5">
        <form action="{{ route('Status_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">status</label>
                <input type="text" class="form-control" id="status" name ="status" placeholder="Your status">
            </div>
    </div>
    <button type ="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>


    <div>
        {{ $projects->links() }}
    </div>
</div>
    <br>
@endsection

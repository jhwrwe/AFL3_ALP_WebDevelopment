@extends('layouts.template')

@section('layout_content')

<form action="/view_menu" method="GET" class="form-inline w-25 d-flex gap-2">
    <input class="form-control" type="search" name="search" placeholder="Search">
    <button type="submit" class="btn btn-outline-success">Search</button>
</form>

<table class="table table-striped">
    <tr>
        <th>NO</th>
        <th>status_id</th>
        <th>status</th>
        <th>description</th>
        <th>photo</th>
        <th>actions</th>
    </tr>
    @foreach($projects as $pro)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $pro['id'] }}</a></td>
                <td>{{ $pro['status'] }}</td>
                <td>
                    <a href="{{ route('edit_status',$pro) }}">
                        <button class="btn btn-info" id="edit" name="edit">Edit</button>
                    </a>
                    <form action="{{ route('status_destroy',$pro) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" id="delete" name="delete">Delete</button>
                    </form>
                </td>

    @endforeach
</table>
<div class ="contaianer mt-5">
    <form action="{{ route('Status_store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">status</label>
      <input type="text" class="form-control" id="status" name ="status" placeholder="Your status">
    </div>
    </div>
    <button type ="submit" class="btn btn-primary">submit</button>
    </form>
  </div>


<div>
    {{ $projects->links() }}
</div>

@endsection

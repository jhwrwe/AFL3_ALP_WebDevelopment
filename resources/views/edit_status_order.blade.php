@extends('layouts.template')
@section('layout_content')

<div class ="contaianer mt-5">
  <form action="{{ route('update_order_status',$OrderEdit) }}" method="POST" enctype="multipart/form-data">
    @method('put')
  @csrf
<div class = "mb-3">
    <label for="status_id" class = "form-label">change the status of the order</label>
    <select name="status_id" id="status_id" required>
        @foreach($status as $status)
        <option value = "{{ $status->id }}">{{ $status->status }}</option>
        @endforeach
    </select>
  </div>

  <button type ="submit" class="btn btn-primary">submit</button>
  </form>
</div>

@endsection

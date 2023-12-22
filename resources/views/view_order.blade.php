@extends('layouts.template')

@section('layout_content')

<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
          <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                  class="fas fa-angle-down mt-1"></i></a></p>
          </div>
        </div>

        <form action="/view_menu" method="GET" class="form-inline w-100 d-flex gap-2 mb-4">
          <input class="form-control" type="search" name="search" placeholder="Search">
          <button type="submit" class="btn btn-outline-success">Search</button>
        </form>

        <table class="table table-striped">
          <tr>
            <th>Tanggal</th>
            <th>Kuantitas</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>

          @foreach ($order_menu as $order_menu_item)
          @if($order_menu_item->order && $order_menu_item->order->user_id == Auth::id() && Auth::user()->isUser())
          <tr>
            <td>
              @if($order_menu_item->order)
              {{ $order_menu_item->order->tanggal }}
              @else
              Order is null for this record
              @endif
            </td>
            <td>{{ $order_menu_item->quantity }}</td>
            <td>
              @if($order_menu_item->menu)
              {{ $order_menu_item->menu->name }}
              @else
              Menu is null for this record
              @endif
            </td>
            <td>{{ $order_menu_item->harga }}</td>
            <td>
              @foreach ($status as $statusItem)
              @if($order_menu_item->order)
              @if($order_menu_item->order->status_id == $statusItem->id)
              {{ $statusItem->status }}
              @endif
              @else
              Status is null for this record
              @endif
              @endforeach
            </td>
            <td>
              <a href="{{ route('edit_status_order',$order_menu_item->order) }}">
                <button class="btn btn-info" id="edit" name="edit">Edit</button>
              </a>
            </td>
          </tr>
          @else
          <tr>
            <td>
              @if($order_menu_item->order)
              {{ $order_menu_item->order->tanggal }}
              @else
              Order is null for this record
              @endif
            </td>
            <td>{{ $order_menu_item->quantity }}</td>
            <td>
              @if($order_menu_item->menu)
              {{ $order_menu_item->menu->name }}
              @else
              Menu is null for this record
              @endif
            </td>
            <td>{{ $order_menu_item->harga }}</td>
            <td>
              @foreach ($status as $statusItem)
              @if($order_menu_item->order)
              @if($order_menu_item->order->status_id == $statusItem->id)
              {{ $statusItem->status }}
              @endif
              @else
              Status is null for this record
              @endif
              @endforeach
            </td>
            <td>
              <a href="{{ route('edit_status_order',$order_menu_item->order) }}">
                <button class="btn btn-info" id="edit" name="edit">Edit</button>
              </a>
            </td>
          </tr>
          @endif
          @endforeach

        </table>

        <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
              <input type="text" id="form1" class="form-control form-control-lg" />
              <label class="form-label" for="form1">Discount code</label>
            </div>
            <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection

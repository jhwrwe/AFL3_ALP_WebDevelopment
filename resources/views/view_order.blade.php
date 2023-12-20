@extends('layouts.template')

@section('layout_content')

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

<form action="/view_menu" method="GET" class="form-inline w-25 d-flex gap-2">
    <input class="form-control" type="search" name="search" placeholder="Search">
    <button type="submit" class="btn btn-outline-success">Search</button>
</form>

            <table class="table table-striped">
                <tr>
                <th>tanggal</th>
                <th>quantity</th>
                <th>menu</th>
                <th>final price</th>
                <th>status</th>
                </tr>
            {{-- @foreach ($order_menu  as $order_menu)

            @if($order_menu->order && $order_menu->order->user_id == Auth::id())


    <tr>
        <td>
            @if($order_menu->order)
                {{ $order_menu->order->tanggal}}
            @else
                Order is null for this record
            @endif
        </td>
        <td>{{ $order_menu->quantity }}</td>
        <td>
            @if($order_menu->menu)
                {{ $order_menu->menu->name }}
            @else
                Menu is null for this record
            @endif
        </td>
        <td>{{ $order_menu->harga }}</td>
        <td>
            @if($order_menu->order)
                {{ $order_menu->order->status_id }}
            @else
                Status is null for this record
            @endif
        </td>

</tr>
@endif

            @endforeach --}}
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

@endsection

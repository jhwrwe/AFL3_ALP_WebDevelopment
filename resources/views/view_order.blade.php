@extends('layouts.template')
<style>
    footer p,
    footer h6 {
        color: #CFAC89;
    }
    .btn-block {
            color: #cfac89;
            background-color: #42332e;
            border: #cfac89 solid 1px;
        }

        .btn-block:hover {
            color: #42332e;
            background-color: #cfac89;
            border: #42332e solid 1px;
        }
        .btn-info {
            color: #cfac89;
            background-color: #42332e;
            border: #cfac89 solid 1px;
        }

        .btn-info:hover {
            color: #42332e;
            background-color: #cfac89;
            border: #42332e solid 1px;
        }
</style>

@section('layout_content')
    <section class="h-100">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Keranjang Belanja</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">Urutkan Berdasarkan:</span> <a href="#!"
                                    class="text-body">Pertama <i class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            @if (Auth::user()->isAdmin() || Auth::user()->isStaff())
                                <th>Nama user</th>
                            @endif
                            <th>Tanggal</th>
                            <th>Kuantitas</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Status</th>
                            @if (Auth::user()->isAdmin() || Auth::user()->isStaff())
                                <th>Actions</th>
                            @endif
                        </tr>

                        @foreach ($order_menu as $order_menu_item)
                            @if ($order_menu_item->order && $order_menu_item->order->user_id == Auth::id() && Auth::user()->isUser())
                                <tr>
                                    @if (Auth::user()->isAdmin())
                                        <td>
                                            {{ $order_menu_item->order->user->name }}
                                        </td>
                                    @endif
                                    <td>
                                        @if ($order_menu_item->order)
                                            {{ $order_menu_item->order->tanggal }}
                                        @else
                                            Order is null for this record
                                        @endif
                                    </td>
                                    <td>{{ $order_menu_item->quantity }}</td>
                                    <td>
                                        @if ($order_menu_item->menu)
                                            {{ $order_menu_item->menu->name }}
                                        @else
                                            Menu is null for this record
                                        @endif
                                    </td>
                                    <td>{{ $order_menu_item->harga }}</td>
                                    <td>
                                        @foreach ($status as $statusItem)
                                            @if ($order_menu_item->order)
                                                @if ($order_menu_item->order->status_id == $statusItem->id)
                                                    {{ $statusItem->status }}
                                                @endif
                                            @else
                                                Status is null for this record
                                            @endif
                                        @endforeach
                                    </td>
                                    @if (Auth::user()->isAdmin())
                                        <td>
                                            <a href="{{ route('edit_status_order', $order_menu_item->order) }}">
                                                <button class="btn btn-info" id="edit" name="edit">Edit</button>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @else
                                @if (Auth::user()->isAdmin()|| Auth::user()->isStaff())
                                    <tr>
                                        <td>
                                            {{ $order_menu_item->order->user->name }}
                                        </td>
                                        <td>
                                            @if ($order_menu_item->order)
                                                {{ $order_menu_item->order->tanggal }}
                                            @else
                                                Order is null for this record
                                            @endif
                                        </td>
                                        <td>{{ $order_menu_item->quantity }}</td>
                                        <td>
                                            @if ($order_menu_item->menu)
                                                {{ $order_menu_item->menu->name }}
                                            @else
                                                Menu is null for this record
                                            @endif
                                        </td>
                                        <td>{{ $order_menu_item->harga }}</td>
                                        <td>
                                            @foreach ($status as $statusItem)
                                                @if ($order_menu_item->order)
                                                    @if ($order_menu_item->order->status_id == $statusItem->id)
                                                        {{ $statusItem->status }}
                                                    @endif
                                                @else
                                                    Status is null for this record
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('edit_status_order', $order_menu_item->order) }}">
                                                <button class="btn btn-info" id="edit" name="edit">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </table>

                    <!-- Move the div outside the foreach loop -->
                    @if (Auth::user()->isUser())
                    <div class="card">
                        <div class="card-body">
                            <a href="https://wa.me/62933152007">
                                <button type="button" class="btn btn-warning btn-block btn-lg">Bayar</button>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

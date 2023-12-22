{{-- resources/views/livewire/search-menu.blade.php --}}

<div>
    <table class="table table-striped">
        <tr>
            <th>NO</th>
            <th>name</th>
            <th>price</th>
            <th>description</th>
            <th>photo</th>
            <th>actions</th>
        </tr>
        @foreach($projects as $pro)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td><a href="{{ route('Show_menu_clicked', $pro) }}">{{ $pro['name'] }}</a></td>
            <td>{{ $pro['price'] }}</td>
            <td>{{ $pro['description'] }}</td>
            <td>
                @if($pro->photo)
                <div style="max-height:350px; overflow:hidden">
                    <img src="{{ asset('storage/'.$pro['photo']) }}" alt="{{ $pro->name }}" class="img-fluid">
                </div>
                @else
                <img src="{{ asset('images/notavailable.jpg') }}" alt="No Image" class="img-fluid">
                @endif
            </td>
            <td>
                <a href="{{ route('edit_menu', $pro) }}">
                    <button class="btn btn-info" id="edit" name="edit">Edit</button>
                </a>
                <form action="{{ route('menu_destroy', $pro) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" id="delete" name="delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div>
        {{ $projects->links() }}
    </div>
</div>

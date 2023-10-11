<tr>
    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $kebab->name }}</strong></td>
    <td>{{ $kebab->description }}</td>
    <td>{{ $kebab->address }}</td>
    <td>{{ $kebab->phone }}</td>
    <td>{{ $kebab->open_time }}</td>
    <td>{{ $kebab->close_time }}</td>
    <td>
        <form action="{{ route('shops.destroy', $kebab) }}" method="POST">
            @csrf
            @method('DELETE')

            <a class="btn btn-info" href="{{ route('shops.show', $kebab) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('shops.edit', $kebab) }}">Edit</a>


            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>

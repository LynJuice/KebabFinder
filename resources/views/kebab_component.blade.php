<tr>
    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $kebab->name }}</strong></td>
    <td>{{ $kebab->description }}</td>
    <td>{{ $kebab->address }}</td>
    <td>{{ $kebab->phone }}</td>
    <td>{{ $kebab->open_time }}</td>
    <td>{{ $kebab->close_time }}</td>
    <td>
        <form action="{{ route('kebab.destroy', $kebab->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('kebab.show', $kebab->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('kebab.edit', $kebab->id) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
    </td>
</tr>

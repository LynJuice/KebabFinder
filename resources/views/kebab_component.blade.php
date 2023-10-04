<tr>
    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $kebab->name }}</strong></td>
    <td>{{ $kebab->description }}</td>
    <td>{{ $kebab->address }}</td>
    <td>{{ $kebab->phone }}</td>
    <td>{{ $kebab->open_time }}</td>
    <td>{{ $kebab->close_time }}</td>
    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i
                        class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i
                        class="bx bx-show me-1"></i> Show</a>
                <a class="dropdown-item" href="javascript:void(0);"><i
                        class="bx bx-trash me-1"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>
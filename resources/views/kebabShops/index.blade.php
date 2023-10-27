@extends('layouts.admin_base')

@section('title', 'KebabShop Table')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Kebabinių sąrašas</h2>
        </div>
        <!-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('table') }}"> Back</a>
        </div> -->
    </div>
</div>





<div class="card">
    <h5 class="card-header">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
            Pridėti kebabinę
        </button>
        <div class="modal fade" id="modalCreate" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Pridėti kebabinę</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('shops.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">
                            <label for="name">Pavadinimas:</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                            @error('name')
                            <small>{{$message}}</small><br>
                            @enderror

                            <br><label for="description">Aprašymas:</label>
                            <input class="form-control" type="text" name="description" value="{{ old('description') }}">

                            <br><label for="address">Adresas:</label>
                            <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                            @error('address')
                            <small>{{$message}}</small><br>
                            @enderror

                            <br><label for="latitude">Latitude:</label>
                            <input class="form-control" type="text" name="latitude" value="{{ old('latitude') }}">
                            @error('latitude')
                            <small>{{$message}}</small><br>
                            @enderror

                            <br><label for="longitude">Longitude:</label>
                            <input class="form-control" type="text" name="longitude" value="{{ old('longitude') }}">
                            @error('longitude')
                            <small>{{$message}}</small><br>
                            @enderror

                            <br><label for="phone">Telefonas:</label>
                            <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <small>{{$message}}</small><br>
                            @enderror
                            <label for="open_time">Atidarymo laikas:</label>
                            <input class="form-control" type="text" name="open_time" value="{{ old('open_time') }}"><br>
                            @error('open_time')
                            <small>{{$message}}</small><br>
                            @enderror

                            <br><label for="close_time">Uždarymo laikas:</label>
                            <input class="form-control" class="form-control" type="text" name="close_time" value="{{ old('close_time') }}">
                            @error('close_time')
                            <small>{{$message}}</small><br>
                            @enderror

                            <br><label for="kebab_image_create" class="form-label">Nuotrauka</label>
                            <input name="image" class="form-control" type="file" id="kebab_image_create">
                            @error('image')
                            <small>{{$message}}</small><br>
                            @enderror

                            <br><label for="logo_image_create" class="form-label">Logotipas</label>
                            <input name="logo" class="form-control" type="file" id="logo_image_create">
                            @error('logo')
                            <small>{{$message}}</small><br>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Uždaryti</button>
                            <button type="submit" class="btn btn-primary" value="Submit">Pridėti</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nuotrauka</th>
                    <th>Pavadinimas</th>
                    <th>Aprašas</th>
                    <th>Adresas</th>
                    <th>Telefonas</th>
                    <th>Atidarymo laikas</th>
                    <th>Uždarymo laikas</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kebab_list as $shop)
                <tr>
                    <td><img src="{{ asset('images/diners/logos/' . $shop->logo) }}" alt="" width="50" height="50"></td>
                    <td><img src="{{ asset('images/diners/photos/' . $shop->image) }}" alt="" width="50" height="50"></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $shop->name }}</strong></td>
                    <td>{{ $shop->description }}</td>
                    <td>{{ $shop->address }}</td>
                    <td><span class="badge bg-label-primary me-1">{{ $shop->phone }}</span></td>
                    <td>{{ $shop->open_time }}</td>
                    <td>{{ $shop->close_time }}</td>
                    <td>
                        <div class="dropdown position-static">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a type="button" class="dropdown-item" href="{{ route('shops.products.index', $shop) }}"><i class='bx bxs-cat bx-rotate-180'></i> Produktai</a>
                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-name="{{ $shop->name }}" data-description="{{ $shop->description }}" data-address="{{ $shop->address }}" data-latitude="{{ $shop->latitude }}" data-longitude="{{ $shop->longitude }}" data-phone="{{ $shop->phone }}" data-opentime="{{ $shop->open_time }}" data-closetime="{{ $shop->close_time }}" data-image="{{ $shop->image }}" data-link-edit="{{route('shops.update', $shop) }}"> <i class="bx bx-edit-alt me-1"></i> Keisti</a></button>
                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal" data-link-delete="{{route('shops.destroy', $shop) }}"><i class="bx bx-trash me-1"></i> Trinti</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="text-center modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Ar tikrai norite ištrinti?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne</button>
                <form id='confirmDelete' method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"" type=" submit"> <i class="bx bx-trash me-1"></i> Taip</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="EditModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="text-center modal-header">
                <h5 class="modal-title text-center" id="EditModelLabel">Kebabines informacijos keitimas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <form id='editInformation' action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ old('id') }}">

                <div class="modal-body">
                    <label for="name">Pavadinimas:</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                    @error('name')
                    <small>{{$message}}</small><br>
                    @enderror

                    <br><label for="description">Aprašymas:</label>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">

                    <br><label for="address">Adresas:</label>
                    <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                    @error('address')
                    <small>{{$message}}</small><br>
                    @enderror

                    <br><label for="latitude">Latitude:</label>
                    <input class="form-control" type="text" name="latitude" value="{{ old('latitude') }}">
                    @error('latitude')
                    <small>{{$message}}</small><br>
                    @enderror

                    <br><label for="longitude">Longitude:</label>
                    <input class="form-control" type="text" name="longitude" value="{{ old('longitude') }}">
                    @error('longitude')
                    <small>{{$message}}</small><br>
                    @enderror

                    <br><label for="phone">Telefonas:</label>
                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                    <small>{{$message}}</small><br>
                    @enderror
                    <label for="open_time">Atidarymo laikas:</label>
                    <input class="form-control" type="text" name="open_time" value="{{ old('open_time') }}"><br>
                    @error('open_time')
                    <small>{{$message}}</small><br>
                    @enderror

                    <br><label for="close_time">Uždarymo laikas:</label>
                    <input class="form-control" class="form-control" type="text" name="close_time" value="{{ old('close_time') }}">
                    @error('close_time')
                    <small>{{$message}}</small><br>
                    @enderror

                    <br><label for="kebab_image_edit" class="form-label">Nuotrauka</label>
                    <input name="image" class="form-control" type="file" id="kebab_image_edit">
                    @error('image')
                    <small>{{$message}}</small><br>
                    @enderror

                    <br><label for="logo_image_edit" class="form-label">Logotipas</label>
                    <input name="logo" class="form-control" type="file" id="logo_image_edit">
                    @error('logo')
                    <small>{{$message}}</small><br>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Uždaryti</button>
                    <button type="submit" class="btn btn-primary" value="Submit">Keisti</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('styles')
@endsection

@section('scripts')
<script>
    const modalDelete = document.getElementById('deleteModal');
    modalDelete.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const link = button.dataset.linkDelete;
        const confirmDelete = document.getElementById("confirmDelete");
        confirmDelete.setAttribute('action', link);
    });

    const modalEdit = document.getElementById('editModal');
    modalEdit.addEventListener('show.bs.modal', function(event) {
        const data = event.relatedTarget.dataset;
        document.getElementById("editInformation").setAttribute('action', data.linkEdit);

        const name = data.name;
        modalEdit.querySelector('.modal-title').textContent = "Kebabines informacijos keitimas: " + name;
        modalEdit.querySelector('[name="name"]').value = name;
        modalEdit.querySelector('[name="description"]').value = data.description;
        modalEdit.querySelector('[name="address"]').value = data.address;
        modalEdit.querySelector('[name="latitude"]').value = data.latitude;
        modalEdit.querySelector('[name="longitude"]').value = data.longitude;
        modalEdit.querySelector('[name="phone"]').value = data.phone;
        modalEdit.querySelector('[name="open_time"]').value = data.opentime;
        modalEdit.querySelector('[name="close_time"]').value = data.closetime;
        modalEdit.querySelector('[name="image"]').value = data.image;
        modalEdit.querySelector('[name="id"]').value = data.linkEdit;

    });
</script>

@if ($errors->any())
@if (old('_method'))
<script>
    window.onload = () => {
        const myModal = new bootstrap.Modal('#editModal');
        document.getElementById("editInformation").setAttribute('action', '{{old("id")}}');
        myModal.show();
    }
</script>
@else
<script>
    window.onload = () => {
        const myModal = new bootstrap.Modal('#modalCreate');
        myModal.show();
    }
</script>
@endif
@endif
@endsection
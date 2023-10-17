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
        @if ($errors->any())
        <script>
            window.onload = () => {
                const myModal = new bootstrap.Modal('#modalCreate');
                myModal.show();
            }
        </script>
        @endif
        <div class="modal fade" id="modalCreate" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Pridėti kebabinę</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('products.store')}}" method="post">
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

                            <label for="image">Image:</label>
                            <input type="text" name="image" value="{{ old('image') }}"><br>
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
                    <th>Pavadinimas</th>
                    <th>Aprašas</th>
                    <th>Adresas</th>
                    <th>Telefonas</th>
                    <th>Atidarymo laikas</th>
                    <th>Uždarymo laikas</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($kebab_list as $kebab)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $kebab->name }}</strong></td>
                    <td>{{ $kebab->description }}</td>
                    <td>{{ $kebab->address }}</td>
                    <td><span class="badge bg-label-primary me-1">{{ $kebab->phone }}</span></td>
                    <td>{{ $kebab->open_time }}</td>
                    <td>{{ $kebab->close_time }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void();"><i class="bx bx-edit-alt me-1"></i> Keisti</a>

                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" data-link-delete="{{route('products.destroy', $kebab) }}"><i class="bx bx-trash me-1"></i> Trinti</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <p>Ar jūs isitikine kad norite ištrinti šia kebabine?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne</button>
                <form id='confirmDelete' method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button class="dropdown-item" type="submit"> <i class="bx bx-trash me-1"></i> Taip</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('styles')
@endsection

@section('scripts')
<script>
    const modal = document.getElementById('exampleModal');
    modal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const link = button.dataset.linkDelete;
        const confirmDelete = document.getElementById("confirmDelete");
        confirmDelete.setAttribute('action', link);
    });
</script>
@endsection
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
                    <form action="{{route('shops.store')}}" method="post">
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

                            <!-- <label for="is_open">Is Open:</label> -->
                            <!-- <input class="form-control" type="checkbox" name="is_open" {{ old('is_open') ? 'checked' : '' }}><br> -->

                            <br><label for="open_time">Atidarymo laikas:</label>
                            <input class="form-control" type="text" name="open_time" value="{{ old('open_time') }}">
                            @error('open_time')
                            <small>{{$message}}</small><br>
                            @enderror

                            <br><label for="close_time">Uždarymo laikas:</label>
                            <input class="form-control" class="form-control" type="text" name="close_time" value="{{ old('close_time') }}">
                            @error('close_time')
                            <small>{{$message}}</small><br>
                            @enderror

                            <br><label for="image">Image:</label>
                            <input type="text" name="image" value="{{ old('image') }}">



                            <!-- <div class="row">
                                <div class="col mb-3">
                                    <input type="text" id="nameWithTitle" class="form-control" placeholder="Pavadinimas">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <input type="text" id="nameWithTitle" class="form-control" placeholder="Aprašas">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <input type="text" id="nameWithTitle" class="form-control" placeholder="Adresas">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <input type="text" id="nameWithTitle" class="form-control" placeholder="Telefonas">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <input type="text" id="nameWithTitle" class="form-control" placeholder="Atidarymo Laikas">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <input type="text" id="nameWithTitle" class="form-control" placeholder="Uždarymo Laikas">
                                </div>
                            </div> -->
                            <!-- <div class="row g-2">
                                <div class="col mb-0">
                                    <input type="email" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx">
                                </div>
                                <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">DOB</label>
                                    <input type="date" id="dobWithTitle" class="form-control">
                                </div>
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Uždaryti</button>
                            <button type="submit" class="btn btn-primary" value="Submit">Pridėti</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- <button class="btn btn-primary" id="openModalButton">Pridėti</button> -->
    </h5>
    <!-- <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
            <p>This is a modal dialog.</p>
        </div>
    </div> -->
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

                                <form method="POST" action="{{route('shops.destroy', $kebab) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"> <i class="bx bx-trash me-1"></i> Trinti</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


@section('styles')
<style>
    /* .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    .modal-content {
        background-color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        border: 1px solid #ccc;
    }

    .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px;
        cursor: pointer;
    } */
</style>
@endsection

@section('scripts')
<script>
    // function setallert() {
    //     alert("Hello! I am an alert box!");
    // }
    // const openModalButton = document.getElementById("openModalButton");
    // const modal = document.getElementById("modal");
    // const closeModal = document.getElementById("closeModal");

    // openModalButton.addEventListener("click", function() {
    //     modal.style.display = "block";
    // });

    // closeModal.addEventListener("click", function() {
    //     modal.style.display = "none";
    // });

    // // Close the modal if the user clicks outside of it
    // window.addEventListener("click", function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // });
</script>





@endsection
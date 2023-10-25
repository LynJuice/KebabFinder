@extends('layouts.admin_base')

@section('title', 'Vartotojo Produktai')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Produktai</h2>
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header">
        <div class="table-responsive">

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                Pridėti produktą
            </button>

            <!-- Create -->
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Kebabines pridejimas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('products.store')}}" method="post">
                            @csrf
                            <div class="modal-body">

                                <br><label for="name">Pavadinimas</label>
                                <input type="text" name="name" class="form-control" placeholder="Pavadinimas" value="{{ old('name') }}">
                                @error('name')
                                <small>{{$message}}</small><br>
                                @enderror

                                <br><label for="description">Aprašymas</label>
                                <input type="text" name="description" class="form-control" placeholder="Aprašymas" value="{{ old('description') }}">
                                @error('description')
                                <small>{{$message}}</small><br>
                                @enderror

                                <br><label for="price">Kaina</label>
                                <input type="text" name="price" class="form-control" placeholder="Kaina" value="{{ old('price') }}">
                                @error('price')
                                <small>{{$message}}</small><br>
                                @enderror

                                <br><label for="image">Nuotrauka</label>
                                <input type="text" name="image" class="form-control" placeholder="Nuotrauka" value="{{ old('image') }}">
                                @error('image')
                                <small>{{$message}}</small><br>
                                @enderror



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="Submit">Pridėti</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <!-- Edit -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Produkto informacijos keitimas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id='editInformation' action="" method="post">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ old('id') }}">

                            <div class="modal-body">

                                <br><label for="name">Pavadinimas</label>
                                <input type="text" name="name" class="form-control" placeholder="Pavadinimas" value="{{ old('name') }}">
                                @error('name')
                                <small>{{$message}}</small><br>
                                @enderror

                                <br><label for="description">Aprašymas</label>
                                <input type="text" name="description" class="form-control" placeholder="Aprašymas" value="{{ old('description') }}">
                                @error('description')
                                <small>{{$message}}</small><br>
                                @enderror

                                <br><label for="price">Kaina</label>
                                <input type="text" name="price" class="form-control" placeholder="Kaina" value="{{ old('price') }}">
                                @error('price')
                                <small>{{$message}}</small><br>
                                @enderror

                                <br><label for="image">Nuotrauka</label>
                                <input type="text" name="image" class="form-control" placeholder="Nuotrauka" value="{{ old('image') }}">
                                @error('image')
                                <small>{{$message}}</small><br>
                                @enderror



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="Submit">Keisti</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Delete -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="text-center modal-header">
                            <h5 class="modal-title text-center" id="deleteModalLabel">Ar tikrai norite ištrinti?</h5>
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

            <table class="table">
                <thead>
                    <tr>
                        <th>Pavadinimas</th>
                        <th>Atsiliepimai</th>
                        <th>Kebabinės</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($products as $product)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product->name }}</strong></td>
                        <td>
                            @if($product->reviews->count('ratings') == 0)
                            <p>Nera atsilepimu apie produkta</p>
                            @else
                            <div class="progress mb-3">



                                <div class="progress-bar bg-danger" style="width: {{ round($product->reviews->avg('rating')*10) *2 }}%;" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-label"> {{ round($product->reviews->avg('rating') * 10 ) / 10  }} / 5 </div>
                                </div>
                                <div class="ms-3"></div>
                            </div>
                            @endif
                        </td>
                        <td>

                            @foreach ($product->kebabShops as $kebabShop)
                            <div> {{ $kebabShop->id }} - {{$kebabShop->name}} </div>
                            @endforeach
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-name="{{ $product->name }}" data-description="{{ $product->description }}" data-price="{{ $product->price }}" data-image="{{ $product->image }}" data-linkEdit="{{ route('products.update', $product) }}"><i class="bx bx-edit-alt me-1"></i> Keisti</a></button>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal" data-linkDelete="{{ route('products.destroy', $product) }}"><i class="bx bx-trash me-1"></i> Trinti</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </h5>
</div>
@endsection
@section('styles')
@endsection
@section('scripts')
<script>
    const modalDelete = document.getElementById('deleteModal');
    modalDelete.addEventListener('show.bs.modal', function(event) {
        console.log(event.relatedTarget.dataset)
        const button = event.relatedTarget;
        const link = button.dataset.linkdelete;
        const confirmDelete = document.getElementById("confirmDelete");
        confirmDelete.setAttribute('action', link);
    });

    const modalCreate = document.getElementById('createModal');
    modalCreate.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const link = button.dataset.linkDelete;
        const confirmCreate = document.getElementById("confirmCreate");
    });

    const modaledit = document.getElementById('editModal');
    modaledit.addEventListener('show.bs.modal', function(event) {
        const data = event.relatedTarget.dataset;
        console.log(data);
        document.getElementById('editInformation').setAttribute('action', data.linkedit);

        const name = data.name;
        modaledit.querySelector('.modal-title').textContent = 'Keisti ' + name;
        modaledit.querySelector('[name="name"]').value = name;
        modaledit.querySelector('[name="description"]').value = data.description;
        modaledit.querySelector('[name="price"]').value = data.price;
        modaledit.querySelector('[name="image"]').value = data.image;
    });
</script>
@if ($errors->any())
<script>
    window.onload = () => {
        const myModal = new bootstrap.Modal('#createModal');
        myModal.show();
    }

    window.onload = () => {
        const myModal = new bootstrap.Modal('#editModal');
        myModal.show();
    }
</script>
@endif
@endsection
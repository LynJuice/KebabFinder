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

            <!-- Modal -->
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('products.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <label for="name">Pavadinimas</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Pavadinimas">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                                <label for="description">Aprašymas</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Aprašymas">
                                @error('description')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                                <label for="price">Kaina</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Kaina">
                                @error('price')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                                <label for="image">Nuotrauka</label>
                                <input type="text" name="image" class="form-control" id="image" placeholder="Nuotrauka">
                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                                <label for="kebab_shops_id">Kebabinė</label>
                                <select name="kebab_shops_id" class="form-control" id="kebab_shops_id">
                                    {{-- @foreach ($ as $kebabShop)
                                    <option value="{{$kebabShop->id}}">{{$kebabShop->name}}</option>
                                    @endforeach --}}
                                </select>

                                <label for="products_id">Produktas</label>
                                <select name="products_id" class="form-control" id="products_id">
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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
                            <div class="progress mb-3">
                                <div class="progress-bar" role="progressbar" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100">
                                </div>
                                <div class="ms-3"></div>
                            </div>
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
                                    <button type="button" class="dropdown-item"><i class="bx bx-edit-alt me-1"></i> Keisti</a></button>
                                    <button type="button" class="dropdown-item"><i class="bx bx-trash me-1"></i> Trinti</button>
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
    const modalCreate = document.getElementById('createModal');
    modalDelete.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const link = button.dataset.linkDelete;
        const confirmDelete = document.getElementById("confirmCreate");
    });
</script>
@endsection
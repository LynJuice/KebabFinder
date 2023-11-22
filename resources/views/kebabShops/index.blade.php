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
        @include('kebabShops.create')
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
                            <td><img src="{{ asset('images/diners/logos/' . $shop->logo) }}" alt="" width="50"
                                    height="50"></td>
                            <td><img src="{{ asset('images/diners/photos/' . $shop->image) }}" alt="" width="50"
                                    height="50"></td>
                            <td><a href="{{ route('shops.show', $shop) }}"><strong>{{ $shop->name }}</strong></a></td>
                            <td>{{ $shop->description }}</td>
                            <td>{{ $shop->address }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ $shop->phone }}</span></td>
                            <td>{{ $shop->open_time }}</td>
                            <td>{{ $shop->close_time }}</td>
                            <td>
                                <div class="dropdown position-static">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a type="button" class="dropdown-item"
                                            href="{{ route('shops.products.index', $shop) }}"><i
                                                class='bx bxs-cat bx-rotate-180'></i> Produktai</a>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-name="{{ $shop->name }}"
                                            data-description="{{ $shop->description }}"
                                            data-address="{{ $shop->address }}" data-latitude="{{ $shop->latitude }}"
                                            data-longitude="{{ $shop->longitude }}" data-phone="{{ $shop->phone }}"
                                            data-opentime="{{ $shop->open_time }}"
                                            data-closetime="{{ $shop->close_time }}" data-image="{{ $shop->image }}"
                                            data-link-edit="{{ route('shops.update', $shop) }}"> <i
                                                class="bx bx-edit-alt me-1"></i> Keisti</a></button>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-link-delete="{{ route('shops.destroy', $shop) }}"><i
                                                class="bx bx-trash me-1"></i> Trinti</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kebab_list->links() }}
        </div>
    </div>

    @include('kebabShops.delete')

    @include('kebabShops.update')
@endsection

@section('styles')
@endsection

@section('scripts')
    @include('map.create')
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
            // modalEdit.querySelector('[name="image"]').value = data.image;
            modalEdit.querySelector('[name="id"]').value = data.linkEdit;

            // mapEdit.invalidateSize();

            mapEdit.updateMarkerPosition();

            setTimeout(function() {
                mapEdit.map.invalidateSize();
                // console.log(mapEdit);
            }, 800);


        });
        window.onload = () => {
            var myModal = document.getElementById('modalCreate');
            myModal.addEventListener('show.bs.modal', function() {
                console.log('show');
                mapCreate.updateMarkerPosition();

                setTimeout(function() {
                    mapCreate.map.invalidateSize();
                    // console.log(mapEdit);
                }, 800);
            });
        }
    </script>

    @if ($errors->any())
        @if (old('_method'))
            <script>
                window.onload = () => {
                    const myModal = new bootstrap.Modal('#editModal');
                    document.getElementById("editInformation").setAttribute('action', '{{ old('id') }}');
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

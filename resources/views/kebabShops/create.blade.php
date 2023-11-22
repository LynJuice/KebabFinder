<h5 class="card-header">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
        Pridėti kebabinę
    </button>
    <div class="modal fade" id="modalCreate" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Pridėti kebabinę</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('shops.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <label for="name">Pavadinimas:</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                            <small>{{ $message }}</small><br>
                        @enderror

                        <br><label for="description">Aprašymas:</label>
                        <input class="form-control" type="text" name="description"
                            value="{{ old('description') }}">

                        <br><label for="address">Adresas:</label>
                        <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                        @error('address')
                            <small>{{ $message }}</small><br>
                        @enderror

                        <br><label for="phone">Telefonas:</label>
                        <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <small>{{ $message }}</small><br>
                        @enderror
                        <label for="open_time">Atidarymo laikas:</label>
                        <input class="form-control" type="text" name="open_time"
                            value="{{ old('open_time') }}"><br>
                        @error('open_time')
                            <small>{{ $message }}</small><br>
                        @enderror

                        <br><label for="close_time">Uždarymo laikas:</label>
                        <input class="form-control" class="form-control" type="text" name="close_time"
                            value="{{ old('close_time') }}">
                        @error('close_time')
                            <small>{{ $message }}</small><br>
                        @enderror

                        <br><label for="kebab_image_create" class="form-label">Nuotrauka</label>
                        <input name="image" class="form-control" type="file" id="kebab_image_create">
                        @error('image')
                            <small>{{ $message }}</small><br>
                        @enderror

                        <br><label for="logo_image_create" class="form-label">Logotipas</label>
                        <input name="logo" class="form-control" type="file" id="logo_image_create">
                        @error('logo')
                            <small>{{ $message }}</small><br>
                        @enderror

                        <br><label for="createLatitudeInput">Latitude:</label>
                        <input name="latitude" id="createLatitudeInput" type="text" class="form-control" aria-label="Flatitude" value="{{ old('latitude') }}">
                        {{-- <input class="form-control" type="text" name="latitude" value="{{ old('latitude') }}"> --}}
                        @error('latitude')
                            <small>{{ $message }}</small><br>
                        @enderror

                        <br><label for="createLongitudeInput">Longitude:</label>
                        <input name="longitude" id="createLongitudeInput" type="text" class="form-control" aria-label="longitude" value="{{ old('longitude') }}">
                        @error('longitude')
                            <small>{{ $message }}</small><br>
                        @enderror

                        <div id="mapCreate" class="map"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Uždaryti</button>
                        <button type="submit" class="btn btn-primary" value="Submit">Pridėti</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</h5>
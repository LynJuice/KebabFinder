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
                        <small>{{ $message }}</small><br>
                    @enderror

                    <br><label for="description">Aprašymas:</label>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">

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
                    <input class="form-control" type="text" name="open_time" value="{{ old('open_time') }}"><br>
                    @error('open_time')
                    <small>{{ $message }}</small><br>
                    @enderror
                    
                    <br><label for="close_time">Uždarymo laikas:</label>
                    <input class="form-control" class="form-control" type="text" name="close_time"
                    value="{{ old('close_time') }}">
                    @error('close_time')
                    <small>{{ $message }}</small><br>
                    @enderror
                    
                    <br><label for="kebab_image_edit" class="form-label">Nuotrauka</label>
                    <input name="image" class="form-control" type="file" id="kebab_image_edit">
                    @error('image')
                    <small>{{ $message }}</small><br>
                    @enderror

                    <br><label for="logo_image_edit" class="form-label">Logotipas</label>
                    <input name="logo" class="form-control" type="file" id="logo_image_edit">
                    @error('logo')
                    <small>{{ $message }}</small><br>
                    @enderror
                    
                    <br><label for="editLatitudeInput">Latitude:</label>
                    <input id="editLatitudeInput" class="form-control" type="text" name="latitude" value="{{ old('latitude') }}">
                    @error('latitude')
                        <small>{{ $message }}</small><br>
                    @enderror

                    <br><label for="editLongitudeInput">Longitude:</label>
                    <input id="editLongitudeInput" class="form-control" type="text" name="longitude" value="{{ old('longitude') }}">
                    @error('longitude')
                        <small>{{ $message }}</small><br>
                    @enderror
                    
                    <div id="mapEdit" class="map"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">Uždaryti</button>
                    <button type="submit" class="btn btn-primary" value="Submit">Keisti</button>
                </div>
            </form>
        </div>
    </div>
</div>
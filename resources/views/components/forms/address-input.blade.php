<div class="col-lg-12 mb-3">
    <label for="address"><i class="fas fa-map-marker-alt mr-1"></i>Adresse <span class="text-danger">*</span></label>
    <input id="autocomplete" type="text" name="address"  placeholder="Choisissez un lieu"
           value="{{$address ?? old('address')}}" class="form-control">
    @error('address')
    <span class="text-danger small">
                                                    <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                                </span>
    @enderror
    @error('latitude')
    <span class="text-danger small">
                                                    <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                                </span>
    @enderror
    @error('longitude')
    <span class="text-danger small">
                                                    <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                                </span>
    @enderror
    <div class="form-group  d-none" id="latitudeArea">
        <label>Latitude</label>
        <input type="text" id="latitude" name="latitude" class="form-control" value="{{($latitude ?? old('latitude')) ?? '48.8534'}}">
    </div>

    <div class="form-group  d-none" id="longtitudeArea">
        <label>Longitude</label>
        <input type="text" name="longitude" id="longitude" class="form-control" value="{{($longitude ?? old('longitude')) ?? '2.3488'}}">
    </div>

</div>
@push('js')
    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key=AIzaSyC0LW-Fj2hruSJXj0TnlYitxC28yYbxZZ8&libraries=places"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
            });
        }
    </script>
@endpush

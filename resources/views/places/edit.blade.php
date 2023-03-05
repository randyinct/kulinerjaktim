<x-templates.default>
    
    <x-slot name="title">Edit Data Tempat Kuliner</x-slot>

    <form action="{{ route('place.update', $place) }}" method="POST" enctype="multipart/form-data" class="card">
        @method('PUT')
            @csrf
            <div class="card-header">
                <h1 class="card-title">Edit Data {{ $place->name }}</h1>
            </div>

            <div class="card-body">    
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan nama tempat kuliner" value="{{ old('name') ?? $place->name }}">

                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="masukan deskripsi tempat kuliner">{{ old('description') ?? $place->description }}</textarea>

                        @error('description')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="sub_district_id">Kecamatan</label>
                        <select name="sub_district_id" id="" class="form-control @error('sub_district_id') is-invalid @enderror">
                            @foreach ($subDistricts as $data)
                            <option value="{{ $data->id }}" @if($data->id == $place->sub_district_id) selected @endif>{{ $data->name }}</option>
                            @endforeach
                        </select>

                        @error('sub_district_id')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>         
                    
                    <div class="form-group mt-2">
                        <label for="address">Alamat</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Masukan nama tempat kuliner" value="{{ old('address') ?? $place->address}}">

                        @error('address')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-2">
                        <label for="phone">Telepon</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Masukan nama tempat kuliner" value="{{ old('phone') ?? $place->phone}}">

                        @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-2">
                        <label for="image">Foto</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Masukan nama tempat kuliner" value="{{ old('image') }}">

                        @error('image')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>   

                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="map"></div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control @error('latitude') is-invalid @enderror" placeholder="Masukan nama tempat kuliner" value="{{ old('latitude') ?? $place->latitude}}" readonly>
            
                                    @error('latitude')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="longitude">Longitude</label>
                                <input type="text" name="longitude" id="longitude" class="form-control @error('longitude') is-invalid @enderror" placeholder="Masukan nama tempat kuliner" value="{{ old('longitude') ?? $place->longitude}}" readonly>
        
                                @error('longitude')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-primary float-end">
                </div>              
    </form>

    @push('extra-style')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>

    <style>
        #map { height: 400px; }
    </style>

    @endpush

    @push('extra-scripts')

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

    <script>
        var map = L.map('map').setView([{{ $place->latitude }}, {{ $place->longitude }}], 10);
        var marker = L.marker([{{ $place->latitude }}, {{ $place->longitude }}], {draggable: 'true'}).addTo(map);


            marker.on('dragend', function(event){   
                var marker = event.target
                var position = marker.getLatLng();

                marker.setLatLng(position, {draggable: 'true'}).update()
            $('#latitude').val(position.lat)
            $('#longitude').val(position.lng)
            })

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);



            function onLocationError(e) {
            alert(e.message);
            }

            map.locate({setView: true, maxZoom: 16});
            map.on('locationerror', onLocationError);    

    </script>
            
    @endpush
</x-templates.default>
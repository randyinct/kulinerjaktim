<x-templates.default>
    
    <x-slot name="title">Tambah Tempat Kuliner</x-slot>

    <form action="{{ route('place.store') }}" method="POST" enctype="multipart/form-data" class="card">
            @csrf
            <div class="card-header">
                <h1 class="card-title">Tambah Data Tempat Kuliner Kuliner</h1>
            </div>

            <div class="card-body">    
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Tempat Kuliner (Ex: Kopi Terang Bulan)" value="{{ old('name') }}">

                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi Tempat (Ex: Tempat ngopi asik)">{{ old('description') }}</textarea>

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
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
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
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat lengkap (Ex: Jln. Lorem Ipsum)" value="{{ old('address') }}">

                        @error('address')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-2">
                        <label for="phone">Telepon</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="No Telepon (Ex: 0812343221)" value="{{ old('phone') }}">

                        @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-2">
                        <label for="image">Foto</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">

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
                                    <input type="text" name="latitude" id="latitude" class="form-control @error('latitude') is-invalid @enderror" placeholder="Masukan latitude tempat kuliner" value="{{ old('latitude') }}" readonly>
            
                                    @error('latitude')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="longitude">Longitude</label>
                                <input type="text" name="longitude" id="longitude" class="form-control @error('longitude') is-invalid @enderror" placeholder="Masukan longitude tempat kuliner" value="{{ old('longitude') }}" readonly>
        
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
        var map = L.map('map').fitWorld();

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

            function onLocationFound(e) {
            var radius = e.accuracy;
                // memasukan lat/long ke value di html
            $('#latitude').val(e.latlng.lat)
            $('#longitude').val(e.latlng.lng)
            
            var locationMarker = L.marker(e.latlng, {draggable: 'true'}).addTo(map);

            locationMarker.on('dragend', function(event){
                var marker = event.target
                var position = marker.getLatLng();

                marker.setLatLng(position, {draggable: 'true'}).update()
            $('#latitude').val(position.lat)
            $('#longitude').val(position.lng)
            })
            }

            function onLocationError(e) {
            alert(e.message);
            }

            map.locate({setView: true, maxZoom: 10});
            map.on('locationerror', onLocationError);    
            map.on('locationfound', onLocationFound);

    </script>
            
    @endpush
</x-templates.default>
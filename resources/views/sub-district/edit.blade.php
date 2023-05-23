<x-templates.default>
    <x-slot name="title">Edit Data Kecamatan</x-slot>
    <form action="{{ route('sub-district.update', $subDistricts->id) }}" method="POST" enctype="multipart/form-data" class="card">
        @method('PUT')
            @csrf
            <div class="card-header">
                <h1 class="card-title">Edit Data Kecamatan {{ $subDistricts->name }}</h1>
            </div>

            <div class="card-body">    
                    <div class="form-group">
                        <label for="name">Nama Kecamatan</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan nama tempat kecamatan" value="{{ old('name') ?? $subDistricts->name }}">

                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-primary float-end">
                </div>              
    </form>
</x-templates.default>
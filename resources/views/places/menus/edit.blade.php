<x-templates.default>

    <x-slot name="title">
        Edit Menu
    </x-slot>

       <form action="{{ route('menu.update', [$place, $menu]) }}" method="POST" enctype="multipart/form-data" class="card">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h1 class="card-title">Edit Data Menu Di {{ $place->name }}</h1>
            </div>

            <div class="card-body">    
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Menu Makanan/Minuman (Ex: Teh Tarik / Nasi Goreng )" value="{{ old('name') ?? $menu->name }}">

                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi makanan (Ex: Nasi, Ayam, Acar)">{{ old('description') ?? $menu->description }}</textarea>

                        @error('description')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                
                    <div class="form-group mt-2">
                        <label for="category_id">Kategori Menu</label>
                        <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                            @foreach ($categories as $data)
                            <option value="{{ $data->id }} " @if ($data->id == $menu->category_id) selected @endif>{{ $data->name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
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

                    <div class="form-group mt-2">
                        <label for="price">Harga</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga Makanan (Ex: 10000)" value="{{ old('price') ?? $menu->price }}">

                        @error('price')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    

                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-primary float-end">
                </div>              
    </form>

</x-templates.default>
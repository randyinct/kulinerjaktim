<x-templates.default>
    <x-slot name="title">menambahkan ulasan baru</x-slot>

    <form
        action="{{ route('review.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="card">
        @csrf
        <div class="card-header">
            <h1 class="card-title">Tambah Ulasan Baru</h1>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-label">Tempat Kuliner</div>
                <select
                    class="form-select"
                    id="floatingSelect"
                    name="place_id"
                    aria-label="Floating label select example">
                    @foreach ($place as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Ulasan Anda</label>
                <textarea
                    class="form-control @error('reviews') is-invalid @enderror"
                    name="reviews"
                    rows="6"
                    placeholder="Content">{{ old('reviews') }}</textarea>

                @error('reviews')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <div class="form-label">Rating Kepuasan</div>
                @foreach ($rating as $item)
                <label class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        name="rating"
                        type="checkbox"
                        value="{{ $item }}">
                        <span class="form-check-label">
                            @for ($i = 1; $i <= $item; $i++)
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-star text-danger"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                            </svg>
                            @endfor
                        </span>
                    </label>
                    @endforeach
                </div>

                <div class="form-group mt-3">
                    <label for="image" class="form-label">Foto</label>
                    <input
                        type="file"
                        name="image"
                        class="form-control @error('image') is-invalid @enderror"
                        value="{{ old('image') }}">

                        @error('image')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

            </div>

            <div class="card-footer">
                <input type="submit" value="Simpan" class="btn btn-primary float-end"></div>
            </form>

    @push('extra-scripts')
    <script>

    //script check box satu only
    $(document).on('click', 'input[type="checkbox"]', function() {      
    $('input[type="checkbox"]').not(this).prop('checked', false);      
    });

    </script>

        
    @endpush
</x-templates.default>
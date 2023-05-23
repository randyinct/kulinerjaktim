<x-templates.default>
    

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('sub-district.create') }}">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-striped col-12" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Penghapusan data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah kamu yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                <button type="button" class="btn btn-danger" data-id="" id="confirmDelete">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
    
    </div>
    @push('extra-style')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.css"/>
    

    @endpush
 
    @push('extra-scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>

    <script>

        $(function(){
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('sub-district.index') !!}',
                columns:[
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action', name: 'action'},
                    
                ]
            });
        });

                //show delete data modal

        $('#dataTable').on('click', 'a#delete', function(e){
            e.preventDefault()
            var id = $(this).data('id')
            $('#confirmDelete').attr('data-id', id)
            $('#deleteModal').modal('show')
            
        })
        $('#confirmDelete').click(function(e){
            e.preventDefault()

            //pengambilan id dari data-id modal
            var id = $(this).data('id')

            // proses delete 
            $.ajax({
                type: 'DELETE',
                url: '/sub-district/' + id,
                data:{
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response){
                    if(response.success){ 
                    window.location.href = ''
                    }
                },
            })
    })
    </script>
    @endpush

    <x-slot name="title">
        Data Kecamatan
    </x-slot>
    
</x-templates.default>
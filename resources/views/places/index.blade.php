<x-templates.default>
        
    <div class="card">
        <div class="card-header">
            <a href="{{ route('place.create') }}" class="btn btn-primary">Tambah data</a>
        </div>

        <div class="card-body">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kecamatan</th>
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
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
                ajax: '{!! route('place.index') !!}',
                columns:[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'place-menu', name: 'place-menu'},
                    {data: 'subDistrictName', name: 'subDistrictName'},
                    {data: 'description', name: 'description'},
                    {data: 'address', name: 'address'},
                    {data: 'phone', name: 'phone'},
                    {data: 'action', name: 'action'},
                ],
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
                url: '/place/' + id,
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

</x-templates.default>
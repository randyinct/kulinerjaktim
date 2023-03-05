<x-templates.default>

    <x-slot name="title">
        Data Menu {{ $place->name }}
    </x-slot>
        
    <div class="card">
        <div class="card-header">
            <a href="{{ route('menu.create', $place) }}" class="btn btn-primary">Tambah data</a>
        </div>

        <div class="card-body">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
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
                                <button type="button" class="btn btn-danger" data-id-place="" data-id-menu="" id="confirmDelete">Hapus</button>
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
                ajax: '{!! route('menu.index', request()->segment(2)) !!}',
                columns:[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image'},
                    {data: 'description', name: 'description'},
                    {data: 'price', name: 'price'},
                    {data: 'action', name: 'action'},
                ],
            });
        });

                //show delete data modal

        $('#dataTable').on('click', 'a#delete', function(e){
            e.preventDefault()
            
            var idPlace = $(this).data('id-place')
            var idMenu = $(this).data('id-menu')

            

            $('#confirmDelete').attr('data-id-place', idPlace)
            $('#confirmDelete').attr('data-id-menu', idMenu)
            $('#deleteModal').modal('show')
            
        })
        $('#confirmDelete').click(function(e){
            e.preventDefault()

            //pengambilan id dari data-id modal
            var idPlace = $(this).data('id-place')
            var idMenu = $(this).data('id-menu')

            // proses delete 
            $.ajax({
                type: 'DELETE',
                url: '/place/' + idPlace + '/menu/' + idMenu,
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
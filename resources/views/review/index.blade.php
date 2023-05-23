<x-templates.default>
    <x-slot name="title">Review Saya</x-slot>

    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kumpulan Review Saya</h3>
                    <div class="card-actions">
                        <a href="{{ route('review.create') }}" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="icon"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            Add new
                        </a>
                    </div>
                </div>
                <div class="card-body  my-2">
                    <div class="table-responsive mt-2 table-border">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tempat Kuliner</th>
                                    <th>Reviews</th>
                                    <th>Rating</th>
                                    <th>Image</th>
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
                ajax: '{!! route('review.index') !!}',
                columns:[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'reviews', name: 'reviews'},
                    {data: 'rating', name: 'rating'},
                    {data: 'image', name: 'image'},
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
                url: '/user/review/' + id,
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
    </script>
@endpush


</x-templates.default>
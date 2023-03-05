<x-templates.default>
    

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Semua Data</h1>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-striped col-12" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Slug</th>
                            </tr>
                        </thead>
                    </table>
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
                ajax: '{!! route('subdistrict.index') !!}',
                columns:[
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'}
                ]
            });
        });
    </script>
    @endpush

    <x-slot name="title">
        Data Kecamatan
    </x-slot>
    
</x-templates.default>
    <!-- Libs JS -->
        <!-- Tabler Core -->
    <script src="{{ asset('/dist/js/demo.min.js')}}"></script>
    <script src="{{ asset('/dist/js/tabler.min.js')}}"></script>

    {{-- <script src="{{ asset('/dist/libs/bootstrap/dist/bootstrap.bundle.min.js') }}"/> --}}
    <script src="{{ asset('/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/jsvectormap/dist/maps/world.js') }}"></script>
    <script src="{{ asset('/dist/libs/jsvectormap/dist/maps/world-merc.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    
    <script>

        //fungsi logout
        $('#logout').click(function(e){
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: 'logout',
                data:{
                    '_token': "{{ csrf_token() }}"
                },
                success: function () {
                    window.location.href = '/'
                },
            })
        })
    </script>

    @stack('extra-scripts')

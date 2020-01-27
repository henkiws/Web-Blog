    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('/') }}assets/js/jquery.min.js"></script>
    <script src="{{ asset('/') }}assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}assets/js/detect.js"></script>
    <script src="{{ asset('/') }}assets/js/fastclick.js"></script>

    <script src="{{ asset('/') }}assets/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery.blockUI.js"></script>
    <script src="{{ asset('/') }}assets/js/waves.js"></script>
    <script src="{{ asset('/') }}assets/js/wow.min.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery.nicescroll.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery.scrollTo.min.js"></script>

    <script src="{{ asset('/') }}assets/plugins/peity/jquery.peity.min.js"></script>

    <!-- jQuery  -->
    <script src="{{ asset('/') }}assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="{{ asset('/') }}assets/plugins/counterup/jquery.counterup.min.js"></script>



    <script src="{{ asset('/') }}assets/plugins/morris/morris.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/raphael/raphael-min.js"></script>

    <script src="{{ asset('/') }}assets/plugins/jquery-knob/jquery.knob.js"></script>

    {{-- <script src="{{ asset('/') }}assets/pages/jquery.dashboard.js"></script> --}}

    <script src="{{ asset('/') }}assets/js/jquery.core.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery.app.js"></script>
    <script src="{{ asset('/') }}assets/js/custom.js"></script>

    {{-- Datatables --}}
    {{-- <script src="{{ asset('/') }}assets/datatables/datatables.bundle.js"></script> --}}
    <script src="{{ asset('/') }}assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/datatables/dataTables.bootstrap.js"></script>
    {{-- <script src="{{ asset('/') }}assets/plugins/datatables/dataTables.buttons.min.js"></script> --}}

    <script src="{{ asset('/') }}assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    @stack('js')

    @stack('script')

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });

            $(".knob").knob();

        });
    </script>

    @if (session('error'))
        <script>
            swal("Error", "{{ session('error') }}", "error");
        </script>
    @endif
    @if (session('success'))
        <script>
            swal("Success","{{ session('success') }}", "success");
        </script>
    @endif
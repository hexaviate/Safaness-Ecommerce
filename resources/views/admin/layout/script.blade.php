<!-- Bootstrap JS -->
    <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
    <!--plugins-->
    <script src="{{ asset("assets/js/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/simplebar/js/simplebar.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/metismenu/js/metisMenu.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js") }}"></script>
    <script src="{{ asset("assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
    <script src="{{ asset("assets/plugins/chartjs/js/Chart.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/chartjs/js/Chart.extension.js") }}"></script>
    <script src="{{ asset("assets/js/index.js") }}"></script>
    <script src="{{ asset("assets/plugins/datatable/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/datatable/js/dataTables.bootstrap5.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/fancy-file-uploader/jquery.ui.widget.js") }}"></script>
	<script src="{{ asset("assets/plugins/fancy-file-uploader/jquery.fileupload.js") }}"></script>
	<script src="{{ asset("assets/plugins/fancy-file-uploader/jquery.iframe-transport.js") }}"></script>
	<script src="{{ asset("assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js") }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <!--app JS-->
    <script src="{{ asset("assets/js/app.js") }}"></script>
    <script>
		$('#fancy-file-upload').FancyFileUpload({
			params: {
				action: 'fileuploader'
			},
			maxfilesize: 1000000
		});
	</script>

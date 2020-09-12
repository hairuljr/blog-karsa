  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ url('backend') }}/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="{{ url('backend') }}/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="{{ url('backend') }}/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="{{ url('backend') }}/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="{{ url('backend') }}/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  {{-- ============= --}}
  <script src="{{ url('backend') }}/node_modules/selectric/public/jquery.selectric.min.js"></script>
  <script src="{{ url('backend') }}/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="{{ url('backend') }}/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ url('backend') }}/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
  <script src="{{ url('backend') }}/node_modules/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="{{ url('backend') }}/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="{{ url('backend') }}/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  {{-- ============= --}}

  @stack('addon-script')
  @stack('sweetalert-script')

  <!-- Template JS File -->
  <script src="{{ url('backend') }}/assets/js/scripts.js"></script>
  <script src="{{ url('backend') }}/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{ url('backend') }}/assets/js/page/modules-datatables.js"></script>

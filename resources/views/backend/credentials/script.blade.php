<script src="{{ asset('admin') }}/assets/js/bootstrap.js"></script>
<script src="{{ asset('admin') }}/assets/js/app.js"></script>
{{-- Ck Editor --}}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script src="{{ asset('admin') }}/assets/js/pages/ckeditor.js"></script> --}}
<!-- Need: Apexcharts -->
<script src="{{ asset('admin') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/pages/dashboard.js"></script>






<script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script src="https://cdn.tiny.cloud/1/pl4gtki7dg5u6mn61u70ddffcwj6904sqp8frkb6sjt1ruod/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> tag in your HTML's <body> -->
<script>
  tinymce.init({
selector: 'textarea',
    skin: 'bootstrap',
    plugins: 'lists link media',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
    menubar: true
  });
</script>

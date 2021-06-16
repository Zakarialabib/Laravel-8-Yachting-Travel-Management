<link rel="apple-touch-icon" href="{{asset('images/favicon-apple.png')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.0/dist/line-awesome/css/line-awesome.min.css" rel="stylesheet" media="screen">

<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/ui/jquery-ui.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/vendors.min.css')}}">
<link rel="stylesheet"  src="{{asset('admin/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/weather-icons/climacons.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/fonts/meteocons/style.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/sl-1.3.3/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/switchery@0.0.2/switchery.css">
<link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/chosen-jquery@0.1.1/lib/chosen.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
<!-- END VENDOR CSS-->
<!-- iCheck -->
<link href="{{asset('/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/menu/menu-types/vertical-content-menu.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/colors/palette-gradient.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/plugins/animate/animate.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/fonts/simple-line-icons/style.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/colors/palette-callout.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/extensions/sweetalert.css')}}">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- END Page Level CSS-->

<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/app.min.css')}}">
<!-- END MODERN CSS-->

<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}">
<link href="{{asset('frontend/assets/css/iziModal.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/iziToast.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/materialize.css')}}" rel="stylesheet">
<!-- END Custom CSS-->

@if (session('error'))
    <script>
        notify("{{ session('error') }}", "error");
    </script>
@endif
@if (session('success'))
    <script>
        notify("{{ session('success') }}");
    </script>
@endif

@stack('css')

<script>
    var app_url = window.location.origin;
</script>
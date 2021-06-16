<!-- STYLES -->
<link rel="apple-touch-icon" href="{{asset('images/favicon-apple.png')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{asset('frontend/assets/css/all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/photoswipe@4.1.3/dist/photoswipe.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/photoswipe@4.1.3/dist/default-skin/default-skin.css"/>
<link href="https://cdn.jsdelivr.net/npm/chosen-jquery@0.1.1/lib/chosen.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/plugins/ion.rangeSlider-2.2.0/css/normalize.css')}}"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.1/css/ion.rangeSlider.min.css"/>
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/plugins/ion.rangeSlider-2.2.0/css/ion.rangeSlider.skinHTML5.css')}}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

<!-- FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap">

<meta name="csrf-token" content="{{ csrf_token() }}">

<script async>
    var app_url = window.location.origin;
</script>

<script defer>
{{setting('google_js_key')}}
</script>

<script defer>
{{setting('facebook_js_key')}}
</script>

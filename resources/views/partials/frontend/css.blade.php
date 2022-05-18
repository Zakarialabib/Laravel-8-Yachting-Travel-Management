<!-- STYLES -->
{{--<link rel="apple-touch-icon" href="{{asset('images/favicon-apple.png')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
 <link href="{{asset('frontend/assets/css/all.css')}}" rel="stylesheet" type="text/css"> --}}
<link rel="stylesheet" href="{{asset('assets/css/master.css')}}" type="text/css">


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

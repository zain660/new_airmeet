
 @php
 $setting = App\Models\Setting::find(1);
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$setting->app_name}}</title>
  <!-- Font Awesome-->
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/fontawesome.css')}}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/icofont.css')}}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/themify.css')}}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/flag-icon.css')}}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/feather-icon.css')}}">
  <!-- Plugins css start-->
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/chartist.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/date-picker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/prism.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/vector-map.css')}}">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/bootstrap.css')}}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/style.css')}}">
  <link id="color" rel="stylesheet" href="{{asset('/front/assets/css/color-1.css')}}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{asset('/front/assets/css/responsive.css')}}">
    <!-- Styles -->
    <style type="text/css">
        :root {
            --primary-color: {{ getSetting('PRIMARY_COLOR') }};
            --primary-color-disabled: {{ getSetting('PRIMARY_COLOR_DISABLED') }};
            --secondary-color: {{ getSetting('SECONDARY_COLOR') }};
        }
    </style>
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fa.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('/front/assets/images') }}/{{ $setting->app_logo }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
      <!-- Font Awesome-->
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/fontawesome.css') }}">
      <!-- ico-font-->
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/icofont.css') }}">
      <!-- Themify icon-->
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/themify.css') }}">
      <!-- Flag icon-->
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/flag-icon.css') }}">
      <!-- Feather icon-->
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/feather-icon.css') }}">
      <!-- Plugins css start-->
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/animate.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/chartist.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/date-picker.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/prism.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vector-map.css') }}">
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.css') }}">
      <!-- App css-->
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}">
      <link id="color" rel="stylesheet" href="{{ asset('/assets/css/color-1.css') }}" media="screen">
      <!-- Responsive css-->
      <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/responsive.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>    {{-- <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
   


    @yield('style')
</head>
  
   <main class="py-4">
    @yield('content')
   </main>
      
    </div>

    @include('layouts.footer')
   <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif
      
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif
      
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif
      
        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>
     <!-- Scripts -->
     {{-- <script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script> --}}
     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/app.min.js') }}"></script>
     <script src="{{ asset('js/toastr.min.js') }}"></script>
     <script src="{{ asset('js/main.js') }}"></script>
     @yield('script')
</body>
</html>

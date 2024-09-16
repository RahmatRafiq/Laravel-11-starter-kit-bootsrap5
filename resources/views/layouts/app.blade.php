<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!-- *************
   ************ CSS Files *************
  ************* -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/bootstrap/bootstrap-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" />
  {{-- <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" /> --}}
<link rel="stylesheet" href="{{ asset('assets/css/customcard.css') }}" />
  <!-- *************
   ************ Vendor Css Files *************
  ************ -->

  <!-- Scrollbar CSS -->
  {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}" /> --}}

  <!-- Toastify CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/toastify/toastify.css') }}" />
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @yield('head')
  @stack('head')
  {{-- <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}"> --}}
  @stack('css')
  @yield('css')
</head>

<body>
  <!-- Page wrapper start -->
  <div class="page-wrapper">

    @include('includes.topbar')

    <!-- Main container start -->
    <div class="main-container">

      @include('includes.sidebar')

      <!-- App container starts -->
      <div class="app-container">
        <!-- App Hero header ends -->
        <main class="app-body h-auto">
          @yield('content')
        </main>
      </div>
    </div>
  </div>

  <!-- *************
   ************ JavaScript Files *************
  ************* -->
  <!-- Required jQuery first, then Bootstrap Bundle JS -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/moment.min.js') }}"></script>

  <!-- *************
   ************ Vendor Js Files *************
  ************* -->

  <!-- Overlay Scroll JS -->
  {{-- <script src="{{asset('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
      <script src="{{asset('assets/vendor/overlay-scroll/custom-scrollbar.js')}}"></script> --}}

  <!-- Toastify JS -->
  <script src="{{ asset('assets/vendor/toastify/toastify.js') }}"></script>
  {{-- <script src="{{asset('assets/vendor/toastify/custom.js')}}"></script> --}}

  <!-- Apex Charts -->
  {{-- <script src="{{asset('assets/vendor/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/vendor/apex/custom/dash1/visitors.js')}}"></script>
      <script src="{{asset('assets/vendor/apex/custom/dash1/sales.js')}}"></script>
      <script src="{{asset('assets/vendor/apex/custom/dash1/sparkline.js')}}"></script>
      <script src="{{asset('assets/vendor/apex/custom/dash1/tasks.js')}}"></script>
      <script src="{{asset('assets/vendor/apex/custom/dash1/income.js')}}"></script> --}}

  <!-- Custom JS files -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/js/todays-date.js') }}"></script>

  <script>
    const sm = window.matchMedia('(min-width: 576px)');
    const md = window.matchMedia('(min-width: 768px)');
    const lg = window.matchMedia('(min-width: 992px)');
    const xl = window.matchMedia('(min-width: 1200px)');
    const xxl = window.matchMedia('(min-width: 1400px)');
  </script>

  <script>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        Toastify({
          text: "{{ $error }}",
          duration: 5000,
          close: true,
          gravity: "top",
          position: "right",
          backgroundColor: "#f5365c",
          stopOnFocus: true,
        }).showToast();
      @endforeach
    @endif

    // success
    @if (session('success'))
      Toastify({
        text: "{{ session('success') }}",
        duration: 5000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#2dce89",
        stopOnFocus: true,
      }).showToast();
    @endif
  </script>
  @stack('javascript')
  @yield('javascript')
</body>

</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  
  <title>@yield('title')</title>
  @include('includes.backend.style')

</head>

<body>
  <div id="app">
    <div class="main-wrapper">

      {{-- navbar section here --}}
      @include('includes.backend.navbar')

      {{-- sidebar section here --}}
      @include('includes.backend.sidebar')

      @yield('content')

      {{-- footer section here --}}
      @include('layouts._modal')
      @include('includes.backend.footer')
    </div>
  </div>
  
      @include('includes.backend.script')
      @include('sweetalert::alert')

</body>
</html>

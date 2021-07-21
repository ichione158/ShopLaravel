<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>{{ $title }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    {{-- Css --}}
    @include('pages.elements.common')

  </head>
  <body id="default_theme" class="it_service">
    
    {{-- Header!!! --}}
    @include('pages.elements.header')

    {{-- Content --}}

    @yield('content')

    {{-- Modal Search!!! --}}
    @include('pages.elements.search')

    {{-- Footer!!! --}}
    @include('pages.elements.footer')

    {{-- Script --}}
    @include('pages.elements.index_script')
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        
        {{-- Css --}}
        @include('admin.elements.common')

    </head>
    <body class="sb-nav-fixed">

        {{-- Header!!! --}}
        @include('admin.elements.header')

        <div id="layoutSidenav">

            {{-- Sidebar!!! --}}
            @include('admin.elements.sidebar')

            {{-- Content --}}

            @yield('content_admin')

        </div>
        
        {{-- Script --}}
        @include('admin.elements.index_script')

    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('page-title')</title>
    @include('includes.head-content-include')
</head>

<body data-sidebar="dark">
<!-- Begin page -->
<div id="layout-wrapper">

@include('includes.header-include')
@include('includes.left-sidebar-include')

@yield('content')

@include('includes.footer-include')

<!-- JAVASCRIPT -->
    @yield('js')
    @include('includes.js-include')
</div>
</body>
</html>

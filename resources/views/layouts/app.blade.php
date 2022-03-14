<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard ecommerce - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    @include(('layouts.partials.css.vendor_css'))
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    @include(('layouts.partials.css.theme_css'))
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    @include(('layouts.partials.css.page_css'))
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    @include(('layouts.partials.css.custom_css'))
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
@include(('layouts.partials.header'))
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
@include(('layouts.partials.menu'))
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    @yield('main')
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include(('layouts.partials.footer'))
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
@include(('layouts.partials.js.vendor_js'))
<!-- END Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
@include(('layouts.partials.js.page_vendor_js'))
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
@include(('layouts.partials.js.theme_js'))
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
@yield('page_js')
<!-- END: Page JS-->

<!-- BEGIN: Custom JS-->
@include(('layouts.partials.js.custom_js'))
<!-- END: Custom JS-->
</body>
<!-- END: Body-->

</html>

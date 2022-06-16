<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'diogoPinto') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles Admin -->
    <link href="{{ asset('css/styles-admin.css') }}" rel="stylesheet">
    @yield('style')   <!--section (style) for a personalized css page-->

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />     
    <!---------->
    <x-embed-styles />
    <script src="https://cdn.tiny.cloud/1/7hfse5cdit2wup27yravzd3aisl1pjy1ol408z4dwx5ix5ql/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


</head>
<body>
<!---
    @component('admin.master.header')  --include top menu --
    @endcomponent    ---->
    <main>
    @component('admin.master.side')  <!--include side menu panel-->
    @endcomponent
        @yield('content')       <!--yield section(content)-->
    </main>
    @component('admin.master.footer')
    @endcomponent

    <!-- Scripts ( defer execute at the end.)-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('script')   <!--section (script) for a personalized script page-->

  

</body>
</html>
